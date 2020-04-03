<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:12 PM
 */

namespace App\Classes\Modules\Staff\Services;


use App\Classes\Modules\Staff\DataTransferObject\StaffObject;
use App\Staff;
use App\Http\Resources\Staff as StaffResources;

class UpdatesStaff
{
    /** @var  Staff */
    private $repository;

    /**
     * UpdatesStaff constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $staffID, StaffObject $object){

        $staff = $this->repository->findOrFail($staffID);

        $staff->company_id = $object->getCompanyId();
        $staff->department_id = $object->getDepartmentId();
        $staff->designation_id = $object->getDesignationId();
        $staff->staff_no = $object->getStaffNo();
        $staff->email = $object->getEmail();
        $staff->username = $object->getUsername();
        $staff->full_name = $object->getFullName();
        $staff->telephone_no = $object->getTelephoneNo();
        $staff->phone_no = $object->getPhoneNo();


        if($staff->save()){
            return new StaffResources($staff);
        }

    }
}