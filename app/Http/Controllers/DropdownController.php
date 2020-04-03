<?php

namespace App\Http\Controllers;

use App\AssetCategory;
use App\Company;
use App\Department;
use App\Designation;
use App\ITAssetBrand;
use App\Staff;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getCompany()
    {
        $data = Company::get();
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

    public function getDepartment()
    {
        $data = Department::get();
        return response()->json($data);
    }

    public function getStaff()
    {
        $data = Staff::OrderBy('staff_no','ASC')->get();
        return response()->json($data);
    }


}
