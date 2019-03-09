<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Facility;
use App\Prefecture;
use App\City;
use App\Message;
use App\MessageTemplate;
use App\Job;
use App\JobCategory;
use App\EmployerMessageTemplate;
use App\Keep;
use App\Scout;
use Jenssegers\Agent\Agent as UserAgent;

class SearchController extends Controller
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

    public function get_jobseekers(Request $request)
    {
        $limit = 3;
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
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age')
            )->paginate($limit,['*'], 'page', $paginaId);


        
        foreach($jobseekers as $jobseeker)
        {
            $jobseeker = $this->prepare_jobseeker($jobseeker);
        }
        $jobseekers= $jobseekers->appends(request()->all());

        return response(['jobseekers'=> $jobseekers],200);

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
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age')
            )->paginate($limit,['*'], 'page', $paginaId);
        
        
        foreach($jobseekers as $jobseeker)
        {
            $jobseeker = $this->prepare_jobseeker($jobseeker);
        }
        $jobseekers= $jobseekers->appends(request()->all());
        return response(['jobseekers'=> $jobseekers],200);
   
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
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age')
            )->paginate($limit,['*'], 'page', $paginaId);
        
        
        foreach($jobseekers as $jobseeker)
        {
            $jobseeker = $this->prepare_jobseeker($jobseeker);
        }
        $jobseekers= $jobseekers->appends(request()->all());
        return response(['jobseekers'=> $jobseekers],200);
    }

    public function get_jobseeker_profile($id)
    {
        $jobseekers = Employee::find($id)->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age')
            )->first();

            $jobseeker = $this->prepare_jobseeker($jobseeker);
    }

    public function prepare_jobseeker(Employee $jobseeker)
    {   
        $prefectures = Prefecture::getAllPrefectures();
        $cities = City::getAllCities();
        $job_categories = JobCategory::where('deleted_flag',0)->get();
        $city= $prefecture = $short_address = $prefecture_name = $city_name= null;
          
            $city =  $cities->filter(function($city) use ($jobseeker){
                return $city->id == $jobseeker->city_id;
            })->first();
            if(isset($city) && !empty($city))
            {
                $city_name = $city->name;
            }

            $prefecture =  $prefectures->filter(function($prefecture) use ($jobseeker){
                return $prefecture->id == $jobseeker->prefecture_id;
            })->first();

            if(isset($prefecture) && !empty($prefecture))
            {
                $prefecture_name = $prefecture->name;
            }

            $short_address = $prefecture_name.$city_name;
            $jobseeker->short_address = $short_address;

            if(isset($jobseeker->desired_occupation) && !empty($jobseeker->desired_occupation))
            {
                $desired_occupations = [];
                $desired_occupation_arr = json_decode($jobseeker->desired_occupation,true);
                foreach($desired_occupation_arr as $desired_occupation)
                {   
                    $job_category =  $job_categories->filter(function($job_category) use ($desired_occupation){
                        return $job_category->id == $desired_occupation['desired_occupation_id'];
                    })->first();

                    $desired_occupations[]= $job_category->name;
                    
                }

                $jobseeker->desired_occupations= $desired_occupations;
             
            }

            if(isset($jobseeker->desired_workplace) && !empty($jobseeker->desired_workplace))
            {
                
                $desired_workplaces = [];
                $desired_workplace_arr = json_decode($jobseeker->desired_workplace,true);
                foreach($desired_workplace_arr as $desired_workplace)
                {   
                    $city= $prefecture = $short_address = $prefecture_name = $city_name= null;
                    $city =  $cities->filter(function($city) use ($desired_workplace){
                        return $city->id == $desired_workplace['desired_city'];
                    })->first();
                    if(isset($city) && !empty($city))
                    {
                        $city_name = $city->name;
                    }
        
                    $prefecture =  $prefectures->filter(function($prefecture) use ($desired_workplace){
                        return $prefecture->id == $desired_workplace['desired_prefecture_id'];
                    })->first();

                    if(isset($prefecture) && !empty($prefecture))
                    {
                        $prefecture_name = $prefecture->name;
                    }
                 
                    $short_address = $prefecture_name.$city_name;

                    $desired_workplaces[]= $short_address;
                    
                }         

                $jobseeker->desired_workplaces = $desired_workplaces;

                if(isset($jobseeker->desired_employment_type) && !empty($jobseeker->desired_employment_type))
                {
                    $desired_employment_type_arr = explode(",",$jobseeker->desired_employment_type);
                    $desired_employment_types = [];
                    $desired_employment_type_str=null;
                    foreach($desired_employment_type_arr as $desired_employment_type)
                    {
                       if(array_key_exists($desired_employment_type,config('custom.employment_type')))
                       {
                            $desired_employment_types[] = config('custom.employment_type')[$desired_employment_type];
                       }
                    }
                    if(!empty($desired_employment_types))
                    {
                        $desired_employment_type_str = implode(" ",$desired_employment_types);
                    }

                    $jobseeker->desired_employment_types = $desired_employment_type_str;
                }

                if(isset($jobseeker->final_education) && !empty($jobseeker->final_education))
                {
                    if(array_key_exists($jobseeker->final_education,config('custom.final_educations')))
                    {
                        $jobseeker->final_education_str = "(".config('custom.final_educations')[$jobseeker->final_education].")";
                    }
                }
                $year = $month = $graduation_category_str= null;
                if(isset($jobseeker->graduation_date) && !empty($jobseeker->graduation_date))
                {
                    $year = $month = null;
                    $date_arr= explode("-",$jobseeker->graduation_date);
                    if(isset($date_arr[0]) && !emptY($date_arr[0]))
                    {
                        $year = $date_arr[0].'年';
                    }
                    if(isset($date_arr[1]) && !emptY($date_arr[1]))
                    {
                        $month = $date_arr[0].'月';
                    }
                    
                    
                }
                if(isset($jobseeker->graduation_category) && !empty($jobseeker->graduation_category))
                {
                    if(array_key_exists($jobseeker->graduation_category,config('custom.graduation_categories')))
                    {
                        $graduation_category_str = config('custom.graduation_categories')[$jobseeker->graduation_category];
                    }
                }

               
                if(isset($jobseeker->employment_situation) && !empty($jobseeker->employment_situation))
                {
                    if(array_key_exists($jobseeker->employment_situations,config('custom.employment_situation')))
                    {
                        $jobseeker->employment_situation = config('custom.employment_situation')[$jobseeker->employment_situation];
                    }
                }

                $graduation_description = $year.$month. $graduation_category_str;
                if(isset($graduation_description) && !empty($graduation_description))
                {
                    $jobseeker->graduation_description= "(".$graduation_description.")";
                }
                
          
            
            }

        return $jobseeker;
    }
}
