<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/6/2020
 * Time: 2:08 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\Staff;
use App\StaffDailyHealth;
use Illuminate\Support\Facades\DB;

class ListsAllNotDoneDailyHealth
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * ListsAllNotDoneDailyHealth constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($companyId,$date)
    {
        $result = DB::select(DB::raw("SELECT DISTINCT staff.full_name FROM staff,staff_daily_health WHERE staff.company_id = :companyId
                                            AND staff.id NOT IN (SELECT staff_id FROM staff_daily_health where created_at LIKE :dateToday)"), array(
            'companyId' => $companyId,
            'dateToday' => "%$date%",
        ));

        return response()->json($result);
    }


}