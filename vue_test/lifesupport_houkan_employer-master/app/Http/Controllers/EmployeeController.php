<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Facility;
use App\Message;
use App\MessageTemplate;
use App\Job;
use App\EmployerMessageTemplate;
use App\Keep;
use App\Scout;
use  App\Http\Resources\Employee as EmployeeResource;
use Jenssegers\Agent\Agent as UserAgent;

class EmployeeController extends Controller
{
    protected $userAgent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserAgent $userAgent)
    {    
        $this->userAgent = $userAgent;
        $this->middleware('auth');
    }
    public function index()
    {
        $match_job_openings=Job::join('job_categories','job_categories.id','=','jobs.job_category_id')
        ->join('facilities','facilities.id','=','jobs.facility_id')
        ->join('prefectures','prefectures.id','=','facilities.prefecture_id')
        ->select(
            'jobs.job_category_id',
            \DB::raw('concat(job_categories.name, " ", prefectures.name) as name')
            )
        ->where('jobs.employer_id',auth()->user()->id)->distinct('jobs.job_category_id')->get();

        $favorited_jobs = Job::join('keeps','keeps.job_id','=','jobs.id')
        ->join('job_categories','job_categories.id','=','jobs.job_category_id')
        ->join('facilities','facilities.id','=','jobs.facility_id')
        ->join('prefectures','prefectures.id','=','facilities.prefecture_id')
        ->select(
            'jobs.id',
            \DB::raw('concat(job_categories.name, " ", facilities.name) as name'),
            'prefectures.name as prefecture_name'
            )
        ->where('jobs.employer_id',auth()->user()->id)->distinct('features.job_id')->get();


        $scouted_jobs = Job::join('scouts','scouts.job_id','=','jobs.id')
        ->join('job_categories','job_categories.id','=','jobs.job_category_id')
        ->join('facilities','facilities.id','=','jobs.facility_id')
        ->join('prefectures','prefectures.id','=','facilities.prefecture_id')
        ->select(
            'jobs.id',
            \DB::raw('concat(job_categories.name, " ", facilities.name) as name'),
            'prefectures.name as prefecture_name'

            )
        ->where('jobs.employer_id',auth()->user()->id)->distinct('scouts.job_id')->get();

        $message_templates =EmployerMessageTemplate::getMessageTemplates(true); 
        if($this->userAgent->isMobile())
        {
            return view('mobileview.searches.index',compact('match_job_openings','message_templates','favorited_jobs','scouted_jobs'));
        }
        return view('searches.index',compact('match_job_openings','message_templates','favorited_jobs','scouted_jobs'));
    }

    public function test_index()
    {
        if($this->userAgent->isMobile())
        {
            return view('mobileview.searches.test_index');
        }
    }

    public function get_jobseekers(Request $request)
    {
        $limit = 20;
        $paginaId = 1;
        if(isset($request->limit) && !empty($request->limit) && is_numeric($request->limit)){
            $limit = $request->limit;
        }
        if(isset($request->page) && !empty($request->page) && is_numeric($request->page)){
            $paginaId = $request->page;
        }
        
      
        $jobseekers = Employee::where(function($q) use($request){
            if(isset($request->member_id) && !empty($request->member_id) && is_numeric($request->member_id))
            {
                
                $q->where('id',$request->member_id);
            }
            if(isset($request->job_category_id) && !empty($request->job_category_id) && is_numeric($request->job_category_id))
            {
                $q->whereRaw('JSON_CONTAINS(desired_occupation, \'{"desired_occupation_id": "'.$request->job_category_id.'"}\')');
            }

        })->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->paginate($limit,['*'], 'page', $paginaId);


        
        $jobseekers= $jobseekers->appends(request()->all());
        $jobseekers= EmployeeResource::collection($jobseekers);
        return $jobseekers;


    }
    



    public function get_scouted_jobseekers(Request $request)
    {
        $limit = 20;
        $paginaId = 1;
        if(isset($request->limit) && !empty($request->limit) && is_numeric($request->limit)){
            $limit = $request->limit;
        }
        if(isset($request->page) && !empty($request->page) && is_numeric($request->page)){
            $paginaId = $request->page;
        }
        
        $job_id = $request->job_id;

        $scouted_employee_ids = Scout::where('job_id',$job_id)
        ->where('employer_id',auth()->user()->id)
        ->distinct('employee_id')
        ->pluck('employee_id')->toArray();

        $jobseekers = Employee::whereIn('id',$scouted_employee_ids)
            ->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->paginate($limit,['*'], 'page', $paginaId);
        
        

        $jobseekers= $jobseekers->appends(request()->all());
        $jobseekers= EmployeeResource::collection($jobseekers);
        return $jobseekers;
   
    }

    public function get_job_options()
    {
        $job_options=Job::join('job_categories','job_categories.id','=','jobs.job_category_id')
        ->join('facilities','facilities.id','=','jobs.facility_id')
        ->select(
            'jobs.id',
            'jobs.employment_type',
            'facilities.name as facility_name',
            'job_categories.name as job_category_name'
        )
        ->where('jobs.employer_id',auth()->user()->id)->get();

        foreach($job_options as $job_option)
        {
            $job_option->name = $job_option->facility_name . " " . $job_option->job_category_name;

            if(array_key_exists($job_option->employment_type,config('custom.employment_type')))
            {
                $job_option->employment_type_name = config('custom.employment_type')[$job_option->employment_type];
                $job_option->name .= " (". config('custom.employment_type')[$job_option->employment_type].")";
            }
        }
     
        return response(['job_options'=> $job_options],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_favorited_jobseekers(Request $request)
    {
        $limit = 20;
        $paginaId = 1;
        if(isset($request->limit) && !empty($request->limit) && is_numeric($request->limit)){
            $limit = $request->limit;
        }
        if(isset($request->page) && !empty($request->page) && is_numeric($request->page)){
            $paginaId = $request->page;
        }
        $job_id = $request->job_id;

        $favorited_employee_ids = Keep::where('job_id',$job_id)
        ->distinct('employee_id')
        ->pluck('employee_id')->toArray();

        $jobseekers = Employee::whereIn('id',$favorited_employee_ids)
            ->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->paginate($limit,['*'], 'page', $paginaId);
        
        $jobseekers= $jobseekers->appends(request()->all());
        $jobseekers= EmployeeResource::collection($jobseekers);
        return $jobseekers;
    }

    public function get_jobseeker_profile($id)
    {
        $jobseeker = Employee::find($id)->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->first();

         $jobseeker = new EmployeeResource($jobseeker);
         return $jobseeker;
    }


   
}
