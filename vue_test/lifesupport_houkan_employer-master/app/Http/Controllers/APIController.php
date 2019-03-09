<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\City;
use App\Town;
use App\Facility;
use App\Job;
use App\JobCategory;

class APIController extends Controller
{
    public function prefectures()
    {
        $prefectures = Prefecture::all();


        return response()->json(['prefectures'=>$prefectures],200);
    }

    public function cities($prefecture_id)
    {
        $cities = City::where('prefecture_id',$prefecture_id)->get();

        return response()->json(['cities'=>$cities],200);
    }

    public function townByPostalCode(Request $request)
    {
        $postal_code =null;
        if(isset($request->postal_code) && !empty($request->postal_code) && is_numeric($request->postal_code)){
            $postal_code = $request->postal_code;
        }   
        $town = Town::where('postal_code',$postal_code)->first();

        return response()->json(['town'=>$town],200);
    }

  

    public function suggestion(Request $request){

        $data = [];

        if($request->type == 'job' || $request->type == null)
        {
            $jobs = Job::join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->join('facilities','facilities.id','=','jobs.facility_id')
            ->join('prefectures','prefectures.id','=','facilities.prefecture_id')
            ->select('jobs.id',
            'facilities.name as facility_name',
            'job_categories.name as job_category_name',
            'prefectures.name as prefecture_name',
            'jobs.employment_type as job_employment_type'
            )
            ->where('jobs.employer_id',auth()->user()->id)->get();
            
            foreach($jobs as $job)
            {
                
                $job_employment_type = null;
                if(array_key_exists($job->employment_type,config('custom.employment_type')))
                {
                    $job_employment_type = config('custom.employment_type')[$job->employment_type];
                }
                $data []=  [
                    'id' => $job->id ,
                    'title' =>  $job->prefecture_name . " " .$job->facility_name . " " . $job->job_category_name . " " .$job_employment_type,
                    'type' => 'job' ,
                ];
            }
        }
        if($request->type == 'facility' || $request->type == null)
        {

            $facilities = Facility::join('prefectures','prefectures.id','=','facilities.prefecture_id')
            ->where('facilities.employer_id',auth()->user()->id)
            ->select('facilities.id','facilities.name as facility_name','prefectures.name as prefecture_name')
            ->get();

    
            foreach($facilities as $facility)
            {
                
                $data []=  [
                    'title' =>  $facility->prefecture_name . " " .$facility->facility_name,
                    'id' => $facility->id ,
                    'type' => 'facility' ,
                ];
            }
        }

        return response(['items' => $data],200);
    }

    public function getJobCategory(Request $request){
        if(isset($request->job_category_id) && !empty($request->job_category_id))
        {   
            $job_category = JobCategory::find($request->job_category_id);

            return response(['job_category' => $job_category],200);

        }
        
    }
}
