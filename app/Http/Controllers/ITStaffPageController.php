<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITStaffPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ITStaffITAsset()
    {
        return view('pages.ITStaff.ITAsset');
    }

    public function ITStaffStaff()
    {
        return view('pages.ITStaff.Staff');
    }

    public function ITStaffIncidentReport()
    {
        return view('pages.ITStaff.IncidentReport');
    }

    public function ITStaffLicense()
    {
        return view('pages.ITStaff.License');
    }
}
