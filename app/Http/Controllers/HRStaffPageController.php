<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/2020
 * Time: 12:36 PM
 */

namespace App\Http\Controllers;


class HRStaffPageController
{
    public function HRStaffITAsset()
    {
        return view('pages.Staff.ITAsset');
    }
    public function HRStaffIncidentReport()
    {
        return view('pages.Staff.IncidentReport');
    }
    public function HRStaffListStaff()
    {
        return view('pages.Staff.ListStaff');
    }
}