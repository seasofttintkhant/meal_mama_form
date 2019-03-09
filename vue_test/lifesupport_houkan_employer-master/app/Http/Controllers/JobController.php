<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;

//Models
use App\Job;
use App\JobCategory;
use App\Feature;
use App\FeatureCategory;
use App\TotalJob;
use App\Code;
use App\EmployerImage;
use App\Facility;

class JobController extends Controller
{
    private $rules = [
        'job_category_id' => 'required',
        'job_title' => 'required',
        'appeal_title' => 'required',
        'appeal_body' => 'required',
        'status' =>  'required',
        'employment_type' =>  'required',

    ];

    protected $attributes = [
        'job_category_id' => '職種',
        'appeal_title' => '訴求文タイトル',
        'appeal_body' => '訴求文',
        'job_content' => '仕事内容',
        'office_hours_conditions' => '勤務時間',
        'holiday' => '休日',
        'special_holiday' => '長期休暇・特別休暇',
        'position_requirement' => '応募要件',
        'desired_requirement' => '歓迎要件',
        'selection_process' => '選考プロセス',

    ];

    protected $messages = [
        'required' => ":attribute は必須項目です。",
    ];
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!isset($_GET['facility_id']) || empty($_GET['facility_id'])){
            abort(404);
        }
        $edit = false;
        $facility = Facility::findOrFail($_GET['facility_id']);
        $jobCategories = JobCategory::where('deleted_flag',0)->get();
        return view('jobs.create',compact('jobCategories','edit','facility'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'job_category_id' => $request->job_category_id,
            'job_title' =>  strip_tags(trim($request->job_title)), 
            'employer_id' => auth()->user()->id,
            'facility_id' => $request->facility_id,
            'photos' => $request->photos,
            'appeal_title' => strip_tags(trim($request->appeal_title)),
            'appeal_body' => strip_tags($request->appeal_body),
            'status' => strip_tags($request->job_status),

            //Additional Forms values 
            'job_content' =>  strip_tags($request->job_content),
            'employment_type' => $request->employment_type,
            'job_offer_salary_regular_min' => isset($request->job_offer_salary_regular_min) && !empty($request->job_offer_salary_regular_min) ? strip_tags(trim($request->job_offer_salary_regular_min)) : 0,
            'job_offer_salary_regular_max' => isset($request->job_offer_salary_regular_max) && !empty($request->job_offer_salary_regular_max) ? strip_tags(trim($request->job_offer_salary_regular_max)) : 0,
            'job_offer_salary_contract_min' => isset($request->job_offer_salary_contract_min) && !empty($request->job_offer_salary_contract_min) ? strip_tags(trim($request->job_offer_salary_contract_min)) : 0,
            'job_offer_salary_contract_max' => isset($request->job_offer_salary_contract_max) && !empty($request->job_offer_salary_contract_max) ? strip_tags(trim($request->job_offer_salary_contract_max)) : 0,
            'job_offer_salary_part_min' => isset($request->job_offer_salary_part_min) && !empty($request->job_offer_salary_part_min) ? strip_tags(trim($request->job_offer_salary_part_min)) : 0,
            'job_offer_salary_part_max' => isset($request->job_offer_salary_part_max) && !empty($request->job_offer_salary_part_max) ? strip_tags(trim($request->job_offer_salary_part_max)) : 0,
            'salary_etc' => strip_tags($request->salary_etc),
            'welfare_programs' => strip_tags($request->welfare_programs),
            'office_hours_conditions' => strip_tags($request->office_hours_conditions),
            'holiday' => strip_tags($request->holiday),
            'special_holiday' => strip_tags($request->special_holiday),
            'position_requirement' => strip_tags($request->position_requirement),
            'desired_requirement' => strip_tags($request->desired_requirement),
            'selection_process' => strip_tags($request->selection_process),
            'feature_category_1' => makeOptionString($request->feature_category_1),
            'feature_category_2' => makeOptionString($request->feature_category_2),
            'feature_category_3' => makeOptionString($request->feature_category_3),
            'feature_category_4' => makeOptionString($request->feature_category_4),
            'feature_category_5' => makeOptionString($request->feature_category_5),
            'feature_category_6' => makeOptionString($request->feature_category_6),
            'feature_category_7' => makeOptionString($request->feature_category_7),
            'feature_category_8' => makeOptionString($request->feature_category_8),
            'feature_category_9' => makeOptionString($request->feature_category_9),
            'feature_category_10' => makeOptionString($request->feature_category_10),
            'feature_category_11' => makeOptionString($request->feature_category_11),
            'feature_category_12' => makeOptionString($request->feature_category_12),
            'feature_category_13' => makeOptionString($request->feature_category_13),
            'job_recruitment_fee_full_contract' => strip_tags(trim($request->job_recruitment_fee_full_contract)),
            'job_recruitment_fee_part' => strip_tags(trim($request->job_recruitment_fee_part)),
        ];

        $rules=$this->extra_fields_validation($data['job_category_id'],$this->rules);
   
    
        $validator = Validator::make($data,$rules,$this->messages,$this->attributes);

        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],422);
        }

        $job = new Job;
        if($job->fill($data)->save())
        {
            Code::send_new_job_notification_to_employers($job);

            if(isset($request->images) && !empty($request->images))
            {
               EmployerImage::updateEmployerImageforResource($request->images,$job->id);
            }

                
            /**Update total job counts by prefecture and category */
            TotalJob::updateJobCount($job->facility_id,$job->job_category_id);

            // return response()->json([],200);
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        if($job->employer_id !== auth()->user()->id)
        {
            abort(404);
        }
        $edit = true;

        $facility = Facility::findOrFail($job->facility_id);
        $jobCategories = JobCategory::where('deleted_flag',0)->get();
        return view('jobs.edit',compact('job','jobCategories','edit','facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        if($job->employer_id !== auth()->user()->id)
        {
            abort(404);
        }
        $data = [
            'job_category_id' => $request->job_category_id,
            'job_title' =>  strip_tags(trim($request->job_title)), 
            'employer_id' => auth()->user()->id,
            'facility_id' => $request->facility_id,
            'photos' => $request->photos,
            'appeal_title' => strip_tags(trim($request->appeal_title)),
            'appeal_body' => strip_tags($request->appeal_body),
            'status' => strip_tags($request->job_status),

            //Additional Forms values 
            'job_content' =>  strip_tags($request->job_content),
            'employment_type' => $request->employment_type,
            'job_offer_salary_regular_min' => isset($request->job_offer_salary_regular_min) && !empty($request->job_offer_salary_regular_min) ? strip_tags(trim($request->job_offer_salary_regular_min)) : 0,
            'job_offer_salary_regular_max' => isset($request->job_offer_salary_regular_max) && !empty($request->job_offer_salary_regular_max) ? strip_tags(trim($request->job_offer_salary_regular_max)) : 0,
            'job_offer_salary_contract_min' => isset($request->job_offer_salary_contract_min) && !empty($request->job_offer_salary_contract_min) ? strip_tags(trim($request->job_offer_salary_contract_min)) : 0,
            'job_offer_salary_contract_max' => isset($request->job_offer_salary_contract_max) && !empty($request->job_offer_salary_contract_max) ? strip_tags(trim($request->job_offer_salary_contract_max)) : 0,
            'job_offer_salary_part_min' => isset($request->job_offer_salary_part_min) && !empty($request->job_offer_salary_part_min) ? strip_tags(trim($request->job_offer_salary_part_min)) : 0,
            'job_offer_salary_part_max' => isset($request->job_offer_salary_part_max) && !empty($request->job_offer_salary_part_max) ? strip_tags(trim($request->job_offer_salary_part_max)) : 0,
            'salary_etc' => strip_tags($request->salary_etc),
            'welfare_programs' => strip_tags($request->welfare_programs),
            'office_hours_conditions' => strip_tags($request->office_hours_conditions),
            'holiday' => strip_tags($request->holiday),
            'special_holiday' => strip_tags($request->special_holiday),
            'position_requirement' => strip_tags($request->position_requirement),
            'desired_requirement' => strip_tags($request->desired_requirement),
            'selection_process' => strip_tags($request->selection_process),
            'feature_category_1' => makeOptionString($request->feature_category_1),
            'feature_category_2' => makeOptionString($request->feature_category_2),
            'feature_category_3' => makeOptionString($request->feature_category_3),
            'feature_category_4' => makeOptionString($request->feature_category_4),
            'feature_category_5' => makeOptionString($request->feature_category_5),
            'feature_category_6' => makeOptionString($request->feature_category_6),
            'feature_category_7' => makeOptionString($request->feature_category_7),
            'feature_category_8' => makeOptionString($request->feature_category_8),
            'feature_category_9' => makeOptionString($request->feature_category_9),
            'feature_category_10' => makeOptionString($request->feature_category_10),
            'feature_category_11' => makeOptionString($request->feature_category_11),
            'feature_category_12' => makeOptionString($request->feature_category_12),
            'feature_category_13' => makeOptionString($request->feature_category_13),
            'job_recruitment_fee_full_contract' => strip_tags(trim($request->job_recruitment_fee_full_contract)),
            'job_recruitment_fee_part' => strip_tags(trim($request->job_recruitment_fee_part)),
        ];

        $rules=$this->extra_fields_validation($data['job_category_id'],$this->rules);  
        
        $validator = Validator::make($data,$rules,$this->messages,$this->attributes);

        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],422);
        }

 
        $job->fill($data)->update();

        if(isset($request->images) && !empty($request->images))
        {
           EmployerImage::updateEmployerImageforResource($request->images,$job->id);
        }

        return response()->json([],200);
    }


    function extra_fields_validation($job_category_id=null,$rules=[])
    {
        $jobCategory = JobCategory::FindorFail($job_category_id);
        if(isset($jobCategory->feature_category_ids) && !empty($jobCategory->feature_category_ids)){
            $featurCategoryIds = makeOptionArray($jobCategory->feature_category_ids);

            $jobFeatureIds = makeOptionArray($jobCategory->feature_ids);
            $featurCategories = FeatureCategory::whereIn('id',$featurCategoryIds)->get();
            $features = Feature::whereIn('id',$jobFeatureIds)->get();
            
            
            foreach($featurCategories as $featurCategory)
            {
                $feature_category_key = "feature_category_".$featurCategory->id;
                
                if($featurCategory->required == 1 && $features->contains('feature_category_id',$featurCategory->id))
                {
                    $rules[$feature_category_key] = 'required';
                }
                
                if(isset($featurCategory->required_fields) && !empty($featurCategory->required_fields))
                {
                   $required_fields= makeOptionArray($featurCategory->required_fields);
                   foreach($required_fields as $required_field)
                   {
                       $rules[$required_field] = 'required|max:3000';
                   }
                }
            }
        } 


        return $rules;
    }

}
