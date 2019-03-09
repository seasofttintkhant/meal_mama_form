<?php

namespace App\Http\Controllers;

use App\Job;
use Validator;
use App\Employer;
use App\Facility;
use App\JobCategory;
use App\EmployerImage;
use App\FacilityCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class FacilityController extends Controller
{

    protected $rules = [
        'facility_category_id'=> 'required',
        'name' => ['required','string','max:128'],
        'name_kana' => ['required','string','max:128'],
        'zip' => 'required|numeric',
        'prefecture_id' => 'required',
        'city_id' => 'required',
        'street_address' => 'required',
        'building' => '',
        'access' => 'required|max:3000'
    ];

    protected $messages = [
        'required' => ":attribute は必須項目です。",
    ];
    protected $attributes = [
        'facility_category_id' => '施設の業種・形態',
        'name' => '施設名',
        'name_kana' => '施設名（フリガナ）',
        'establish_year' => '施設立年月(年)',
        'establish_month' => '施設立年月(月)',
        'establish_day' => '施設立年月(日)',
        'zip' => '郵便番号',
        'prefecture_id' => '都道府県',
        'city_id' => '市区町村',
        'street_address' => '町名・番地',
        'access' => '施設へのアクセス',
    ];


    public function __construct()
    {
   
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData(Request $request)
    {
        $limit = 10; 
        if(isset($request->limit) && !empty($request->limit))
        {
            $limit = $request->limit;
        }

        $query = Facility::where('facilities.employer_id',auth()->user()->id)
        ->join('prefectures','prefectures.id','=','facilities.prefecture_id')->where(function($q) use ($request){
            if(isset($request->keyword) && !empty($request->keyword))
            {
                $keyword_arr = explode(" ",$request->keyword);
                if(!empty($keyword_arr) && count($keyword_arr) >0)
                {
                    foreach($keyword_arr as $key)
                    {
                        $key = strip_tags(trim($key));
                        $q->where(function($subquery) use ($key){
                            $subquery->orWhere('prefectures.name','LIKE',"%{$key}%");
                            $subquery->orWhere('facilities.name','LIKE',"%{$key}%");
                        });
                    }
                }
            }
        });
        $total = $query->count();
        $facilities =  $query->orderBy('facilities.id', 'desc')->select('facilities.*')->get();
        $images = EmployerImage::where('employer_id',auth()->user()->id)->get();
        foreach($facilities as $facility){
            $facility->job_create_url = route('jobs.create')."?facility_id=".$facility->id;
            $facility_image =null;
            $facility_image = $images->filter(function($image) use($facility){
                 if($image->resource_type == 'facility' && $image->resource_id == $facility->id)
                 {
                    return $image;
                 }
            })->last();

            if(isset($facility_image) && !empty($facility_image))
            {
                $facility->image = '/img/uploads/'.$facility_image->name;
            }
            $facility->facility_category = $facility->facility_category;
            $facility->prefecture = $facility->prefecture;
            $facility->created_date_time = isset($facility->created_at) && !empty($facility->created_at) ? date('Y/m/d H:i',$facility->created_at->timestamp) : "";
            $facility->updated_date_time = isset($facility->updated_at) && !empty($facility->updated_at) ? date('Y/m/d H:i',$facility->updated_at->timestamp) : "";
            
        }


        return response(['data'=> $facilities,'total' => $total],200);  
    }
    public function getAllFacilityJobs(Request $request)
    {
        $facilities =Facility::where('facilities.employer_id',auth()->user()->id)
        ->where(function($q) use ($request){
            if(isset($request->facility_id) && !empty($request->facility_id) && is_numeric($request->facility_id))
            {
                $q->where('facilities.id',$request->facility_id);
            }
           

        })
        ->where(function($sub) use ($request){
          
            if(in_array($request->job_offer_existence,[1,2])){
                $sub->whereHas('jobs',function($subq) use ($request){
                    if($request->job_offer_existence == 1)
                    {    
                        $subq->where('jobs.status',0);
                    }
                    elseif($request->job_offer_existence == 2)
                    {    
                        $subq->where('jobs.status',1);
                    }
                });
            }
            elseif($request->job_offer_existence == 3){
               $sub->doesntHave('jobs');
            }
      
            if(isset($request->job_status) && !empty($request->job_status) && is_array($request->job_status))
            {
                $sub->whereHas('jobs',function($subq) use ($request){
                    $subq->whereIn('jobs.status',$request->job_status);
                });
            }
            if(isset($request->job_category_id) && !empty($request->job_category_id))
            {
                $sub->whereHas('jobs',function($subq) use ($request){
                    $subq->where('jobs.job_category_id',$request->job_category_id);
                });
              
            }

            if(isset($request->employment_type) && !empty($request->employment_type) )
            {
                $sub->whereHas('jobs',function($subq) use ($request){
                    $subq->where('jobs.employment_type',$request->employment_type);
                });
                
            }
        
        })
        ->join('prefectures','prefectures.id','=','facilities.prefecture_id')
        ->select('facilities.*','prefectures.name as prefecture_name')
        ->where(function($q) use ($request){
            if(isset($request->name) && !empty($request->name))
            {
                $name_arr = explode(" ",$request->name);
                if(!empty($name_arr) && count($name_arr) >0)
                {
                    foreach($name_arr as $key)
                    {
                        $key = strip_tags(trim($key));
                        $q->where(function($subquery) use ($key){
                            $subquery->orWhere('prefectures.name','LIKE',"%{$key}%");
                            $subquery->orWhere('facilities.name','LIKE',"%{$key}%");
                        });
                    }
                }
            }
        })
        ->with('jobs')
        ->withCount('jobs')->get();
            
            
        $images = EmployerImage::where('employer_id',auth()->user()->id)->get();

        foreach($facilities as $facility){
            $facility->job_create_url = route('jobs.create')."?facility_id=".$facility->id;
            $facility->facility_edit_url = route('facilities.edit',$facility->id);
            $facility->facility_category = $facility->facility_category;
            $facility->prefecture = $facility->prefecture;
            $facility_image =null;
            $facility_image = $images->filter(function($image) use($facility){
                 if($image->resource_type == 'facility' && $image->resource_id == $facility->id)
                 {
                    return $image;
                 }
            })->last();

            if(isset($facility_image) && !empty($facility_image))
            {
                $facility->image = '/img/uploads/'.$facility_image->name;
            }
            $facility->created_date_time = isset($facility->created_at) && !empty($facility->created_at) ? date('Y/m/d H:i',$facility->created_at->timestamp) : "";
            $facility->updated_date_time = isset($facility->updated_at) && !empty($facility->updated_at) ? date('Y/m/d H:i',$facility->updated_at->timestamp) : "";
            foreach($facility->jobs as $job)
            {
                $job->edit_url = route('jobs.edit',$job->id);
                $job->created_date_time = isset($job->created_at) && !empty($job->created_at) ? date('Y/m/d H:i',$job->created_at->timestamp) : "";
                $job->updated_date_time = isset($job->updated_at) && !empty($job->updated_at) ? date('Y/m/d H:i',$job->updated_at->timestamp) : "";

                 if(isset($job->employment_type) && !empty($job->employment_type)){
                    if(array_key_exists($job->employment_type,config('custom.employment_type')))
                    {
                        $job->employment_type = config('custom.employment_type')[$job->employment_type];
                    }
                }
                    $job_image = null;
                    $job_image = $images->filter(function($image) use($job){
                    if($image->resource_type == 'job' && $image->resource_id == $job->id)
                    {
                        return $image;
                    }       
                    })->last();
               if(isset($job_image) && !empty($job_image))
               {
                   $job->image = '/img/uploads/'.$job_image->name;
               }
                
            }
        }
        $job_total=$facilities->sum('jobs_count');
        return response(['facilities'=> $facilities,'job_total'=>$job_total],200);
    }

    public function index()
    {
        /** Not Getting data at first place.It will be from JS */
        $employment_types = config('custom.employment_type');
        $job_categories = JobCategory::where('deleted_flag',0)->get();
        $facilityCategories= FacilityCategory::all()->pluck('name','id')->toArray();
 
        return view('facilities.index',compact('employment_types','job_categories','facilityCategories'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilityCategories= FacilityCategory::all()->pluck('name','id')->toArray();

        $edit = false;

        return view('facilities.create',compact('facilityCategories','edit'));
    }

    public function getFacilityServiceTypes($facility_category_id)
    {

        $facilityCategory= FacilityCategory::findOrFail($facility_category_id);

        $service_types =$facilityCategory->service_types;

        return response(['service_types'=> $service_types],200);
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $data = [
            'facility_category_id' => $request->facility_category_id,
            'employer_id' => auth()->user()->id,
            'question_1' => $request->question_1,
            'question_2' => $request->question_2,
            'question_3' => $request->question_3,
            'question_4' => $request->question_4,
            'question_5' => $request->question_5,
            'question_6' => $request->question_6,
            'name'=> $request->name,
            'name_kana' => $request->name_kana,
            'establish_year' => $request->establish_year,
            'establish_month' => $request->establish_month,
            'establish_day' => $request->establish_day,
            'zip' => strip_tags(trim($request->zip)),
            'prefecture_id' =>$request->prefecture_id,
            'city_id' => $request->city_id,
            'street_address' => strip_tags(trim($request->street_address)),
            'building' => strip_tags(trim($request->building)),
            'lat' => strip_tags(trim($request->lat)),
            'lng' => strip_tags(trim($request->lng)),
            'access' => strip_tags(trim($request->access)),
            "number_of_beds" => strip_tags($request->number_of_beds),
            "emergency_designation" => strip_tags($request->emergency_designation),
            "open_time" => strip_tags($request->open_time),
            "holiday" => strip_tags($request->holiday),
            "average_patients" => strip_tags($request->average_patients),
            "ambulance_per_year" => strip_tags($request->ambulance_per_year),
            "staff_info" => strip_tags($request->staff_info),
            "fulltime_doctor_info" => strip_tags($request->fulltime_doctor_info),
            "parttime_doctor_info" => strip_tags($request->parttime_doctor_info),
            "equip_info" => strip_tags($request->equip_info),
            "director_name" => strip_tags($request->director_name),
            "director_history" => strip_tags($request->director_history),
            "has_dormitory" => $request->has_dormitory,
            "has_nursery" => $request->has_nursery,
            "prescription_kind" => strip_tags($request->prescription_kind),
            "avarage_prescription_number" => strip_tags($request->avarage_prescription_number),
            "visiting_area" => strip_tags($request->visiting_area),
            "target_age" => strip_tags($request->target_age),
            "capacity" => strip_tags($request->capacity),
         ];
    
         if(isset($request->service_types) && !empty($request->service_types))
         {
            $data['service_types'] = implode(',',$request->service_types);
         }
         
         $validator = Validator::make($data,$this->rules,$this->messages,$this->attributes);


         if($validator->fails()){
             return response(['error'=>$validator->errors()],422);
         }

         $facility = new Facility;
         $facility->fill($data)->save();
         if(isset($request->images) && !empty($request->images))
         {
            EmployerImage::updateEmployerImageforResource($request->images,$facility->id);
         }

         return response(['facility'=>$facility],200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
    
        if($facility->employer_id !== auth()->user()->id)
        {
            abort(404);
        }
        $facilityCategories= FacilityCategory::all()->pluck('name','id')->toArray();

        $edit = true;
        return view('facilities.edit',compact('facility','facilityCategories','edit'));
    }
    public function postPreview(Request $request)
    {
        $images = json_decode($request->images,true);
        return view('facilities.preview');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {

        if($facility->employer_id !== auth()->user()->id)
        {
            return response([],404);
        }

        $data = [
            'facility_category_id' => $request->facility_category_id,
            'employer_id' => auth()->user()->id,
            'question_1' => $request->question_1,
            'question_2' => $request->question_2,
            'question_3' => $request->question_3,
            'question_4' => $request->question_4,
            'question_5' => $request->question_5,
            'question_6' => $request->question_6,
            'name'=> $request->name,
            'name_kana' => $request->name_kana,
            'establish_year' => $request->establish_year,
            'establish_month' => $request->establish_month,
            'establish_day' => $request->establish_day,
            'zip' => strip_tags(trim($request->zip)),
            'prefecture_id' =>$request->prefecture_id,
            'city_id' => $request->city_id,
            'street_address' => strip_tags(trim($request->street_address)),
            'building' => strip_tags(trim($request->building)),
            'lat' => strip_tags(trim($request->lat)),
            'lng' => strip_tags(trim($request->lng)),
            'access' => strip_tags(trim($request->access)),
            "number_of_beds" => strip_tags($request->number_of_beds),
            "emergency_designation" => strip_tags($request->emergency_designation),
            "open_time" => strip_tags($request->open_time),
            "holiday" => strip_tags($request->holiday),
            "average_patients" => strip_tags($request->average_patients),
            "ambulance_per_year" => strip_tags($request->ambulance_per_year),
            "staff_info" => strip_tags($request->staff_info),
            "fulltime_doctor_info" => strip_tags($request->fulltime_doctor_info),
            "parttime_doctor_info" => strip_tags($request->parttime_doctor_info),
            "equip_info" => strip_tags($request->equip_info),
            "director_name" => strip_tags($request->director_name),
            "director_history" => strip_tags($request->director_history),
            "has_dormitory" => $request->has_dormitory,
            "has_nursery" => $request->has_nursery,
            "prescription_kind" => strip_tags($request->prescription_kind),
            "avarage_prescription_number" => strip_tags($request->avarage_prescription_number),
            "visiting_area" => strip_tags($request->visiting_area),
            "target_age" => strip_tags($request->target_age),
            "capacity" => strip_tags($request->capacity),
         
         ];
    
         if(isset($request->service_types) && !empty($request->service_types))
         {
            $data['service_types'] = implode(',',$request->service_types);
         }

         $validator = Validator::make($data,$this->rules,$this->messages,$this->attributes);

         if($validator->fails()){
             return response(['error'=>$validator->errors()],422);
         }

         $facility->fill($data)->update();

         if(isset($request->images) && !empty($request->images))
         {
            EmployerImage::updateEmployerImageforResource($request->images,$facility->id);
         }

         return response(['facility'=>$facility],200);
    }

    
}
