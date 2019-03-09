<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Job;
use App\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use Jenssegers\Agent\Agent as UserAgent;
use App\EmployerMessageTemplate;

class HomeController extends Controller
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
    
        $announcements = Announcement::getAllAnnouncement();
        if($this->userAgent->isMobile())
        {
            $message_templates =EmployerMessageTemplate::getMessageTemplates(true); 
            return view('mobileview.home',compact('announcements','message_templates'));
        }
        return view('home', [
            "announcements" => $announcements
        ]);
    }

    public function get_recommended_jobseekers()
    {
        $limit = request()->limit;

        if(!isset($limit) || empty($limit))
        {
            $limit = 5;
        }

        
        $job_category_ids = Job::where('employer_id',auth()->user()->id)
        ->distinct('job_category_id')->pluck('job_category_id')
        ->toArray(); 
        $jobseekers = Employee::select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->inRandomOrder()->take($limit)->get();

         $jobseekers=  EmployeeResource::collection($jobseekers);
         return $jobseekers;
    }

    public function provisional()
    {
        if(auth()->user()->isActive())
        {
            return redirect('/');
        }
        return view('auth.provisional');
    }

}
