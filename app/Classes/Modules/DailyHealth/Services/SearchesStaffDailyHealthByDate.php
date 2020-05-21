<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/5/2020
 * Time: 1:47 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;
use App\Http\Resources\StaffDailyHealth as StaffDailyHealthResources;

class SearchesStaffDailyHealthByDate
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * SearchesStaffDailyHealthByDate constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, $query)
    {
        $date = explode(',',$query);

        $date1 = strtotime($date[0]);
        $from = date('Y-m-d',$date1);

        $date2 = strtotime($date[1]);
        $to = date('Y-m-d',$date2);

        $dailyHealth = $this->repository
                            ->where('staff_id',$id)
                            ->whereDate('created_at', '>=', $from)
                            ->whereDate('created_at', '<=', $to)
                            ->latest()
                            ->paginate(5);
        return StaffDailyHealthResources::collection($dailyHealth);
    }


}