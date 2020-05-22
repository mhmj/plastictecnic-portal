<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/5/2020
 * Time: 9:49 AM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;

class DeletesStaffDailyHealth
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * DeletesStaffDailyHealth constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $model = $this->repository->findOrfail($id);

        if($model->delete()){
            return $model;
        }
    }


}