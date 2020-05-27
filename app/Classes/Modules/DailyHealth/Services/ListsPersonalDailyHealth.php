<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 2:46 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;
use App\Http\Resources\StaffDailyHealth as StaffDailyHealthResources;

class ListsPersonalDailyHealth
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * ListsPersonalDailyHealth constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($companyId, $staffId)
    {
        $dailyhealth = $this->repository->where('staff_id', $staffId)
                                        ->where('company_id', $companyId)
                                        ->latest()
                                        ->paginate(7);

        return StaffDailyHealthResources::collection($dailyhealth);
    }


}