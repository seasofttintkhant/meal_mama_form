<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobApplication;
use App\JobCategory;
use App\Job;
use App\EmployerMessageTemplate;
use App\Employee;
use App\Qualification;
use Jenssegers\Agent\Agent as UserAgent;
use  App\Http\Resources\Employee as EmployeeResource;
class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userAgent;

    public function __construct(UserAgent $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->middleware('auth');
    }

    public function getSelectionsCount()
    {
        $job_applications= array();
        $job_ids=Job::where('employer_id',auth()->user()->id)
        ->pluck('id')->toArray();
        if(!empty($job_ids))
        {
            $job_applications=JobApplication::whereIn('job_id',$job_ids)->get(); 
            $on_going_keys=JobApplication::get_ongoing_keys();
            $done_keys=JobApplication::get_done_keys();
            $on_going = $job_applications->whereIn('status',$on_going_keys)->count();
            $done = $job_applications->whereIn('status',$done_keys)->count();
            $status_1 = $job_applications->where('status',1)->count();
            $status_2 = $job_applications->where('status',2)->count();
            $status_3 = $job_applications->where('status',3)->count();
            $status_4 = $job_applications->where('status',4)->count();
            $status_5 = $job_applications->where('status',5)->count();
            $status_6 = $job_applications->where('status',6)->count();
            $status_7 = $job_applications->where('status',7)->count();
            $status_8 = $job_applications->where('status',8)->count();
            $status_9 = $job_applications->where('status',9)->count();
            $status_10 = $job_applications->where('status',10)->count();
            $status_11 = $job_applications->where('status',11)->count();
        }

        $data = [
            'on_going' => $on_going,
            'done' => $done,
            'status_1' => $status_1,
            'status_2' => $status_2,
            'status_3' => $status_3,
            'status_4' => $status_4,
            'status_5' => $status_5,
            'status_6' => $status_6,
            'status_7' => $status_7,
            'status_8' => $status_8,
            'status_9' => $status_9,
            'status_10' => $status_10,
            'status_11' => $status_11,
        ];

        return response(['data' => $data],200);
        
    } 

    public function getApplicantProfile($employee_id)
    {
        $jobseeker = Employee::find($id)->select(
            'employees.*',
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as age')
            )->first();

         $jobseeker = new EmployeeResource($jobseeker);
         return $jobseeker;
    }


    public function getSelectionsByStatus(Request $request)
    {

        $job_applications= array();
        $total = 0;
        $job_ids=Job::where('employer_id',auth()->user()->id)
        ->pluck('id')->toArray();
        if(!empty($job_ids))
        {    
            
            $qualifications = Qualification::all();
            $job_applications=JobApplication::whereIn('job_applications.job_id',$job_ids)
            ->join('jobs','jobs.id','=','job_applications.job_id')
            ->join('job_categories','jobs.job_category_id','=','job_categories.id')
            ->join('facilities','facilities.id','=','jobs.facility_id')
            ->join('messages','messages.id','=','job_applications.message_id')
            ->where(function($q) use ($request){
                if(isset($request->status) && !empty($request->status))
                {
                    $q->where('job_applications.status',$request->status);
                }

                if(isset($request->state) && !empty($request->state))
                {
                    if($request->state== 'ongoing')
                    {
                        $keys=JobApplication::get_ongoing_keys();
                        $q->whereIn('job_applications.status',$keys);
                    }
                    elseif($request->state =="done")
                    {
                        $keys=JobApplication::get_done_keys();
                        $q->whereIn('job_applications.status',$keys);
                    }
                }

                if(isset($request->job_or_facility_keyword) && !empty($request->job_or_facility_keyword)){
                        $job_or_facility_keyword = strip_tags(trim($request->job_or_facility_keyword));

                        $q->where(function($sub_query) use ($job_or_facility_keyword){
                            $sub_query->orWhere('jobs.job_title','LIKE',"%{$job_or_facility_keyword}%");
                            $sub_query->orWhere('job_categories.name','LIKE',"%{$job_or_facility_keyword}%");
                            $sub_query->orWhere('facilities.name','LIKE',"%{$job_or_facility_keyword}%");
                            $sub_query->orWhere('facilities.name_kana','LIKE',"%{$job_or_facility_keyword}%");
                        });
                }
                if(isset($request->name_or_id_keyword) && !empty($request->name_or_id_keyword)){
                        $name_or_id_keyword = strip_tags(trim($request->name_or_id_keyword));

                        if(is_numeric($name_or_id_keyword ))
                        {
                            $q->where('job_applications.employee_id',$name_or_id_keyword);
                        }
                        else
                        {
                            $q->where(function($sub_query) use($name_or_id_keyword){
                                $sub_query->orWhere('job_applications.last_name','LIKE',"%{$name_or_id_keyword}%");
                                $sub_query->orWhere('job_applications.first_name','LIKE',"%{$name_or_id_keyword}%");
                                $sub_query->orWhere('job_applications.last_kana','LIKE',"%{$name_or_id_keyword}%");
                                $sub_query->orWhere('job_applications.first_kana','LIKE',"%{$name_or_id_keyword}%");
                            });
                        }
                }
                if(isset($request->memo_keyword) && !empty($request->memo_keyword)){
                        $memo_keyword = strip_tags(trim($request->memo_keyword));

                        $q->where('job_applications.memo','LIKE',"%{$memo_keyword}%");
                }
            })->select(    
                'job_applications.*',
                'job_categories.name as job_category_name',
                'jobs.employment_type as job_employment_type',
                'facilities.name as facility_name',
                'messages.id as message_id',
                \DB::raw('concat(job_applications.last_name, " ", job_applications.first_name) as employee_name'),
                \DB::raw('YEAR(CURDATE()) - YEAR(job_applications.birthday) as employee_age'),
                \DB::raw("from_unixtime(job_applications.created_at, '%Y/%m/%d') as apply_date"),
                \DB::raw("from_unixtime(job_applications.updated_at, '%Y/%m/%d') as updated_date")
                )->get();  

            if(isset($job_applications) && !empty($job_applications)){
                foreach($job_applications as $job_application)
                {
                    $job_application->job_employment_type = config('custom.employment_type')[$job_application->job_employment_type];
                    $job_application->status_str = $job_application->getApplicationStatusStr();
                    if(isset($job_application->qualification) && !empty($job_application->qualification))
                    {   
                    
                        $qualification_arr = makeOptionArray($job_application->qualification);
            
                        foreach($qualification_arr as $qualification_id)
                        {   
                           

                            $applicant_qualifications = array();
                            $qualification=  $qualifications->filter(function($qualification) use ($qualification_id){
                                return $qualification->id == $qualification_id;
                            })->first();

                            if(isset($qualification) && !empty($qualification))
                            {
                                $qualification_name = $qualification->name;
        
                            
                                $applicant_qualifications[] = $qualification_name;
                            } 
                        }

                        $job_application->qualification= $applicant_qualifications;
                       
                    }
                  
                }

                $total = count($job_applications);
            }
        }


        return response(['job_applications' => $job_applications,'total'=>$total],200);
    }
    
    public function index(UserAgent $userAgent)
    {    
        $this->userAgent = $userAgent;
        if($this->userAgent->isMobile())
        {
            return view('mobileview.selections.index');
        }
        
        $message_templates =EmployerMessageTemplate::getMessageTemplates(); 
        return view('selections.index',compact('message_templates'));
    }
    // public function index()
    // {
    //     $message_templates= EmployerMessageTemplate::getMessageTemplates(); 
    
    //     return view('selections.index',compact('message_templates'));
    // }

    public function changeApplicatonStatus($id)
    {

        $status = request('application_status');
 
        $job_application= JobApplication::find($id);

        if(isset($job_application) && !empty($job_application))
        {
            $job_application->update(['status'=>$status]);

            return response([],200);
        }   
    }

    public function addMemo($id)
    {   
        $memo = request('memo');

        $job_application= JobApplication::find($id);

        if(isset($job_application) && !empty($job_application))
        {
            $job_application->update(['memo'=>$memo]);

            return response([],200);
        }   



    }
}
