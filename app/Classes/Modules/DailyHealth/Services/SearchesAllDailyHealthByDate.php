<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/6/2020
 * Time: 11:19 AM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;
use App\Http\Resources\StaffDailyHealth as StaffDailyHealthResources;


class SearchesAllDailyHealthByDate
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * SearchesAllDailyHealthByDate constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($companyId, $query)
    {
        $date = explode(',',$query);

        $date1 = strtotime($date[0]);
        $from = date('Y-m-d',$date1);

        $date2 = strtotime($date[1]);
        $to = date('Y-m-d',$date2);

        $dailyHealth = $this->repository
            ->where('company_id',$companyId)
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->latest()
            ->get();
        return StaffDailyHealthResources::collection($dailyHealth);
    }


}