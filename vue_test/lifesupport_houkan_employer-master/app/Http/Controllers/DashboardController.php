<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as UserAgent;

class DashboardController extends Controller
{
    protected $userAgent;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAgent $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('Hi');
        if($this->userAgent->isMobile())
        {
            dd('mobile');
            return view('mobileview.home');
        }
        return view('main');
    }
}
