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


}
