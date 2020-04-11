<?php

namespace App\Http\Controllers;

use App\AssetCategory;
use App\Company;
use App\Department;
use App\Designation;
use App\ITAsset;
use App\ITAssetBrand;
use App\Staff;
use App\Http\Resources\Staff as StaffResources;
use App\Http\Resources\ITAsset as ITAssetResources;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getCompany()
    {
        $data = Company::get();
        return response()->json($data);
    }
    public function getCompanyDetails($id)
    {
        $data = Company::find($id);
        return response()->json($data);
    }

    public function getITAssetCategory()
    {
        $data = AssetCategory::get();
        return response()->json($data);
    }

    public function getITAssetBrand()
    {
        $data = ITAssetBrand::get();
        return response()->json($data);
    }

    public function getDesignation()
    {
        $data = Designation::get();
        return response()->json($data);
    }
    public function getDesignationDetails($id)
    {
        $data = Designation::find($id);
        return response()->json($data);
    }

    public function getDepartment()
    {
        $data = Department::get();
        return response()->json($data);
    }

    public function getDepartmentDetails($id)
    {
        $data = Department::find($id);
        return response()->json($data);
    }

    public function getStaff()
    {
        $data = Staff::get();
        return response()->json($data);
    }

    public function getStaffDetails(int $id)
    {
        return new StaffResources(Staff::find($id));
    }

    public function getITAsset()
    {
        $data = ITAsset::get();
        return response()->json($data);
    }

    public function getITAssetDetails(int $id)
    {
        return new ITAssetResources(ITAsset::find($id));

    }

    public function getITStaff(int $id)
    {
        $data = Staff::where('role_id',$id)->get();
        return response()->json($data);
        //return $data;
        //return new StaffResources($data);
    }

    public function getStaffByLocation(int $id)
    {
        $data = Staff::where('company_id',$id)->get();
        return response()->json($data);
    }

    public function getITAssetByLocation(int $id)
    {
        $data = ITAsset::where('company_id',$id)->get();
        return response()->json($data);
    }

}
