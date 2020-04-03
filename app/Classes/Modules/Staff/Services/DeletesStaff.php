<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:13 PM
 */

namespace App\Classes\Modules\Staff\Services;

use App\Staff;
use App\Http\Resources\Staff as StaffResources;

class DeletesStaff
{
    /** @var  Staff */
    private $repository;

    /**
     * DeletesStaff constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $staffId)
    {
      $staff = $this->repository->findOrFail($staffId);

        if($staff->delete()){

            return new StaffResources($staff);
        }
    }
}