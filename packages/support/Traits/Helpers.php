<?php

namespace Support\Traits;

use App\Events\SendMail;
use App\General\Feature;
use App\Models\Account2Role;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Support\General\Config;
use \Support\General\Config AS Support;
use App\Models\Account;
use App\Models\Login;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait Helpers
{
    /**
     * get token from header
     *
     * @return string
     */
    public function GetToken()
    {
        $authorization = request()->header(Support::AUTH_KEY);
        if (!Str::startsWith($authorization, Support::AUTH_PREFIX)) {
            return "";
        }

        return Str::substr($authorization, Str::length(Support::AUTH_PREFIX));
    }

    /**
     * @param string $token
     * @return Builder|Model|object|null|Login
     */
    public function AdminLogin(string $token = '')
    {
        $token = empty($token) ? $this->GetToken() : $token;

        return Login::query()
            ->join(Account::$name, Login::$_AccountId, Account::$_Id)
            ->leftjoin(Account2Role::$name,Account2Role::$_AccountId,Account::$_Id)
            ->leftjoin(Role::$name,Role::$_Id,Account2Role::$_RoleId)
            ->select([
                sprintf('%s AS Id', Login::$_Id),
                Login::$_Token,
                Login::$_Agent,
                Login::$_IP,
                Login::$_ValidFrom,
                Login::$_ValidTo,
                Login::$_Token,
                Login::$_SiteId,
                Account::$_Password,
                Account::$_Code,
                Account::$_Status,
                Account::$_DisplayName,
                Account::$_Phone,
                Account::$_Email,
                Account::$_FailedLoginAttempts,
                Account::$_ForcePasswordChange,
                Role::$_DefaultRedirect,
                sprintf('%s AS AccountId', Account::$_Id),
                Account::$_Super,
                Account::$_PartnerId,
            ])
            ->where(Login::$_Token, $token)
            ->first();
    }

    public function MergeRequest($array = [])
    {
        request()->merge($array);
    }

    public function Admin()
    {
        if (!request()->has(Config::ADMIN_LOGIN)) {
            return $this->AdminLogin();
        }

        return request(Config::ADMIN_LOGIN);
    }

    public function GetSiteId(?Builder $account = null): array
    {
        $account = !is_null($account) ? $account : $this->Admin();

        return [$account->SiteId];
    }

    /**
     * @return UuidInterface
     * @throws Exception
     */
    public function Uuid()
    {
        return Uuid::uuid4();
    }

    /**
     * db begin transaction
     */
    public function BeginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * db commit
     */
    public function Commit()
    {
        DB::commit();
    }

    /**
     * db rollback
     */
    public function RollBack()
    {
        DB::rollBack();
    }

    public function CurrencyFormat(string $number)
    {
        return number_format($number, 0, ",", ".");
    }

    public function CreateToken(): string
    {
        return Str::random(Support::TOKEN_LENGTH);
    }

    public function Now($format = '')
    {
        $format = empty($format) ? Support::DEFAULT_DATETIME_FORMAT : $format;

        return now()->format($format);
    }

    public function RandomName($length = Config::RANDOM_NAME)
    {
        return sprintf('%s_%s', time(), strtolower(Str::random($length)));
    }

    /**
     * gửi Mail bằng event Send Mail
     * @param $user : thông tin user
     * @param $subject : subject
     * @param string $template
     * @return SendMail
     */
    function SendMail($user, $subject, $template = '')
    {
        return new SendMail($user, $subject, $template);
    }
}
