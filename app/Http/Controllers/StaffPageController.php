<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffPageController extends Controller
{
    public function StaffITAsset()
    {
        return view('pages.Staff.ITAsset');
    }
    public function StaffIncidentReport()
    {
        return view('pages.Staff.IncidentReport');
    }
    public function StaffListStaff()
    {
        return view('pages.Staff.ListStaff');
    }
}
