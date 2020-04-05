<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('pages.dashboard.dashboard');
    }

    public function ITAsset()
    {
        return view('pages.ITAsset.ITAsset');
    }

    public function Staff()
    {
        return view('pages.Staff.Staff');
    }

    public function IncidentReport()
    {
        return view('pages.IncidentReport.IncidentReport');
    }

    public function ITOperation()
    {
        return view('pages.ITOperation.ITOperation');
    }
}
