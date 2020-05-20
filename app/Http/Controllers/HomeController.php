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
        return view('pages.dashboard');
    }

    public function ITOperation()
    {
        return view('pages.ITOperation');
    }

    public function profile()
    {
        return view('pages.profile');
    }
    public function DailyHealth()
    {
        return view('pages.daily_health');
    }
}
