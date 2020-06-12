<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/2020
 * Time: 4:54 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;
use App\Http\Resources\StaffDailyHealth as StaffDailyHealthResources;


class ListsAllDailyHealth
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * ListsAllDailyHealth constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($companyId,$today)
    {

        $DailyHealth = $this->repository->where('company_id',$companyId)
                                        ->whereDate('created_at', '=', $today)
                                        ->latest()
                                        ->get();
        return StaffDailyHealthResources::collection($DailyHealth);
    }


}