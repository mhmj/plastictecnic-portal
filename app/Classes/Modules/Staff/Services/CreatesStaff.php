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

class CreatesStaff
{
    /** @var  Staff */
    private $repository;

    /**
     * CreatesStaff constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }


    public function execute(StaffObject $object)
    {


        $model = $this->repository->create([
            'company_id' => $object->getCompanyId(),
            'department_id' => $object->getDepartmentId(),
            'designation_id' => $object->getDesignationId(),
            'role_id' => 2,
            'staff_no' => $object->getStaffNo(),
            'email' => $object->getEmail(),
            'username' => $object->getUsername(),
            'full_name' => $object->getFullName(),
            'telephone_no' => $object->getTelephoneNo(),
            'phone_no' => $object->getPhoneNo(),
            'password' => '$2y$10$GYsXiibGBQVsKDJXbzyvQ.AoCky/T/r251TQwciROy3G9f4dU/x3.',
        ]);

        return $model;

    }
}