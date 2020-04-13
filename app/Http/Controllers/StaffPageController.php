<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffPageController extends Controller
{
    public function StaffITAsset()
    {
        return view('pages.Staff.ITAsset');
    }
}
