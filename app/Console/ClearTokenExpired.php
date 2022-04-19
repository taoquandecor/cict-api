<?php

namespace Admin\Console;

use App\General\Config;
use App\Repos\LoginRepo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Support\Traits\Helpers;

class ClearTokenExpired extends Command
{
    use Helpers;

    protected $default = '';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "command:cte";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear token in table tbLogin.';


    private $login;

    /**
     * Create a new command instance.
     * @param LoginRepo $login
     */
    public function __construct(LoginRepo $login)
    {
        parent::__construct();

        $this->login = $login;
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        try {
            $now = $this->Now(Config::DATE_FULL);

            $this->login->DeleteTokensExpired($now);

            return true;
        } catch (\Exception $ex) {
            Log::channel('job')->error($ex);

            return false;
        }
    }
}
