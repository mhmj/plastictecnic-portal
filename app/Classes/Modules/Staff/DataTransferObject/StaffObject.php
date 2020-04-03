<?php

namespace App\Classes\Modules\Staff\DataTransferObject;


class StaffObject
{

    /** @var  int|null */
    private $company_id;

    /** @var  int|null */
    private $department_id;

    /** @var  int|null */
    private $designation_id;

    /** @var  strting|null */
    private $staff_no;

    /** @var  strting|null */
    private $email;

    /** @var  strting|null */
    private $username;

    /** @var  strting|null */
    private $full_name;

    /** @var  strting|null */
    private $telephone_no;

    /** @var  strting|null */
    private $phone_no;

    /**
     * StaffObject constructor.
     * @param int|null $company_id
     * @param int|null $department_id
     * @param int|null $designation_id
     * @param int|null $role_id
     * @param strting|null $staff_no
     * @param strting|null $email
     * @param strting|null $username
     * @param strting|null $full_name
     * @param strting|null $telephone_no
     * @param strting|null $phone_no
     */
    public function __construct(?int $company_id, ?int $department_id,  ?int $designation_id, ?string $staff_no, ?string $email, ?string $username, ?string $full_name, ?string $telephone_no, ?string $phone_no)
    {
        $this->company_id = $company_id;
        $this->department_id = $department_id;
        $this->designation_id = $designation_id;
        $this->staff_no = $staff_no;
        $this->email = $email;
        $this->username = $username;
        $this->full_name = $full_name;
        $this->telephone_no = $telephone_no;
        $this->phone_no = $phone_no;
    }

    /**
     * @return int|null
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @return int|null
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }

    /**
     * @return int|null
     */
    public function getDesignationId()
    {
        return $this->designation_id;
    }

    /**
     * @return strting|null
     */
    public function getStaffNo()
    {
        return $this->staff_no;
    }

    /**
     * @return strting|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return strting|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return strting|null
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @return strting|null
     */
    public function getTelephoneNo()
    {
        return $this->telephone_no;
    }

    /**
     * @return strting|null
     */
    public function getPhoneNo()
    {
        return $this->phone_no;
    }




}