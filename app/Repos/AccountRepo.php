<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Account;
use App\Models\Account2Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Prettus\Validator\Exceptions\ValidatorException;

class AccountRepo extends BaseRepo
{
    function model()
    {
        return Account::class;
    }

    /**
     * search accounts
     * @return mixed
     */
    public function Search()
    {
        $query = $this->query()
            ->distinct()
            ->leftJoin(Account2Role::$name, Account::$_Id, Account2Role::$_AccountId);

        $query = $this->FilterWhereIn($query, 'roles', [Account2Role::$_RoleId]);

        $query = $this->FilterWhereIn($query, 'categories', [Account::$_CategoryId]);

        $query = $this->FilterWhereIn($query, 'status', [Account::$_Status]);

        $query = $this->FilterLike($query, 'keyword', [
            Account::$_Code,
            Account::$_Email,
            Account::$_DisplayName,
            Account::$_Phone,
        ]);

        $query = $query->selectRaw(Account::$_All);

        return $this->Pagination($query);
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     * @throws ValidatorException
     */
    public function CreateUser(StoreRequest $request)
    {
        $data = $request->Data();
        $password = $this->AutoPassword();
        $data['Password'] = bcrypt($password);
        $user = $this->create($data);
        $user->PasswordOriginal = $password;

        return $user;
    }

    public function AutoPassword()
    {
        return Str::random(Config::PASSWORD_LENGTH);
    }

    public function SoftDelete(array $ids)
    {
        return $this->query()
            ->where(Account::$_Status, '!=', Config::DELETED)
            ->whereIn(Account::$_Id, $ids)
            ->update([Account::$_Status => Config::DELETED]);
    }

    /**
     * @param string $code
     * @return Account|null
     */
    public function GetAccountByCode(string $code)
    {
        $query = $this->query()
            ->select([
                Account::$_All,
                sprintf('%s AS AccountId', Account::$_Id)
            ])
            ->where(Account::$_Code, $code);

        return $query->first();
    }

    /**
     * @param $password
     * @param $data
     * @param $code
     * @return Builder|Model|object|null
     * @throws ValidatorException
     */
    public function ForgotPassword($password, $data, $code)
    {
        $user = $this->query()->where(Account::$_Code, $code)->first();
        $user->PasswordOriginal = $password;

        return $this->update($data, $user->Id) ? $user : null;
    }

    /*
     * Lấy danh sách Account, cần phải biết lấy như thế nào? tạm thời lấy hết
     */
    public function GetListAccount()
    {
        return $this->query()
            ->select([
                Account::$_All
            ])->get();
    }

}
