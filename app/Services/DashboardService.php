<?php

namespace App\Services;

use App\General\Dashboard;
use App\Http\Requests\Dashboard\GetRequest;
use App\Repos\DeliveryDetailRepo;
use App\Repos\OrganizationRepo;
use App\Repos\VesselDischargePlanRepo;
use App\Repos\VesselDischargeTerminalRepo;
use App\Repos\VesselLayTimeDetailRepo;
use App\Repos\VesselManifestRepo;
use App\Repos\VesselLayTimeRepo;
use Illuminate\Support\Facades\Log;
use Support\Services\BaseService;

class DashboardService extends BaseService
{
    protected $baseRepo, $baseResponse = 'Dashboard';

    public function __construct(

    )
    {
        parent::__construct();
    }

    public function Index()
    {
        try {
            $response = [
            ];

            return $this->response->Success($response);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

}
