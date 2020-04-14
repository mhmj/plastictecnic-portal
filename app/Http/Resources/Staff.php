<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company as CompanyModel;
use App\Department as DepartmentModel;
use App\Designation as DesignationModel;
use App\Role as RoleModel;

class Staff extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_id' => CompanyModel::where('id', $this->company_id)->first(),
            'department_id' => DepartmentModel::where('id', $this->department_id)->first(),
            'designation_id' => DesignationModel::where('id', $this->designation_id)->first(),
            'role_id' => RoleModel::where('id', $this->role_id)->first(),
            'staff_no' => $this->staff_no,
            'email' => $this->email,
            'username' => $this->username,
            'full_name' => $this->full_name,
            'telephone_no' => $this->telephone_no,
            'phone_no' => $this->phone_no,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
        ];
    }
}
