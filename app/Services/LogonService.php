<?php

namespace App\Services;

use App\General\Organization;
use App\General\Vessel;
use App\Http\Requests\Logon\UpdateProfileRequest;
use App\Http\Requests\Logon\UpdateSecurityRequest;
use App\Models\Role;
use App\Repos\FeatureGroupRepo;
use App\Repos\Account2RoleRepo;
use App\Repos\OrganizationRepo;
use App\Repos\RoleRepo;
use App\Http\Requests\Logon\ChangePasswordRequest;
use App\Repos\AccountRepo;
use App\Repos\RightRepo;
use App\Repos\VesselVoyageRepo;
use Support\Services\BaseService;

class LogonService extends BaseService
{
    private $account2Role, $role, $account, $right, $featureGroup;

    public function __construct(
        Account2RoleRepo $account2Role,
        RoleRepo $role,
        AccountRepo $account,
        RightRepo $right,
        FeatureGroupRepo $featureGroup
    )
    {
        parent::__construct();

        $this->account2Role = $account2Role;
        $this->role = $role;
        $this->account = $account;
        $this->right = $right;
        $this->featureGroup = $featureGroup;
    }

    public function Profile()
    {
        try {
            if (!$user = $this->Admin()) {
                return $this->response->NotFound();
            }

            $user->Roles = $this->account2Role->GetRoleByUserId($user->AccountId, [Role::$_Id, Role::$_DisplayName]);

            return $this->response->Success([
                'User' => $user,
            ]);

        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }

    protected function Update(array $data)
    {
        try {
            if (!$login = $this->Admin()) {
                return $this->response->NotFound();
            }

            $login = $this->account->update($data, $login->AccountId);

            $login->Roles = $this->right->GetRelation($login->AccountId);

            return $this->response->Success(['User' => $login, 'Msg' => __("Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }

    public function UpdateProfile(UpdateProfileRequest $request)
    {
        return $this->Update($request->Data());
    }

    public function UpdateSecurity(UpdateSecurityRequest $request)
    {
        return $this->Update($request->Data());
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        return $this->Update($request->Data());
    }

    public function Refresh()
    {
        try {
            if (!$user = $this->Admin()) {
                return $this->response->ForceLogout();
            }
            $login = $this->Admin();
            $login->Roles = $this->right->GetRelation($user->AccountId);

            $response = [
                'Token' => $this->GetToken(),
                'User'  => $login,
            ];

            return $this->response->Success($response);
        } catch (\Exception $ex) {
            return $this->response->ForceLogout();
        }
    }

    public function Menu()
    {
        try {
            if (!$user = $this->Admin()) {
                return $this->response->ForceLogout();
            }
            $childMenu = $listMenu = $this->featureGroup->GetMenuByUerId($user->AccountId);
            $parentMenu = [];
            foreach ($listMenu as $menu) {
                $parentMenu[] = [
                    'GroupCode' => $menu->GroupCode,
                    'GroupName' => $menu->GroupName,
                    'GroupIcon' => $menu->GroupIcon
                ];
            }
            $parentMenu = array_map("unserialize", array_unique(array_map("serialize", $parentMenu)));

            return $this->response->Success(['ParentMenu' => $parentMenu, 'ChildMenu' => $childMenu]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }
}
