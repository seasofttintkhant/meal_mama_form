<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TotalJob extends Model
{
    public $dateFormat ="U";

    public $guarded = [];

    public static function updateJobCount($facility_id,$job_category_id)
    {    
      $facility = Facility::join('prefectures','prefectures.id','=','facilities.prefecture_id')
      ->select('facilities.id','prefectures.id as prefecture_id','prefectures.area_id')
      ->find($facility_id);
      
      

      $job =self::where('prefecture_id',$facility->prefecture_id)->where('job_category_id',$job_category_id)->first();
      if(isset($job) && !empty($job))
      {
          $job->total_jobs =  $job->total_jobs + 1;
      }
      else{
          $job = new TotalJob;
          $job->area_id = $facility->area_id;
          $job->prefecture_id = $facility->prefecture_id;
          $job->total_jobs = 1;
          $job->job_category_id = $job_category_id;
          $job->save();
      }
    }
}
