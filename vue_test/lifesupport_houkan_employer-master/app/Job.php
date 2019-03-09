<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $dateFormat = 'U';

    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsTo('App\Facility','facility_id');
    }

    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'desc')->get();
    }

    public static $employmentTypeArr =[
        1 => "正職員",
        2 => "契約職員",
        3 => 'パート・アルバイト',
    ];
    

    public function getEmploymentTypeNameAttribute()
    {
        if(array_key_exists($this->employment_type,self::$employmentTypeArr))
        {
            return self::$employmentTypeArr[$this->employment_type];
        }
      return null;        
    }
    // public function getEmploymentTypeNameAttribute()
    // {
    //     if(array_key_exists($this->employment_type,self::$employmentTypeArr))
    //     {
    //         return self::$employmentTypeArr[$this->empyloyment_type];
    //     }
    //   return null;        
    // }

    public $jobgroup = [
        '医科',
        '歯科',
        '介護',
        '保育',
        'リハビリ／代替医療'
    ];
    
    
    const DOCTOR = 1;
    const DENTIST = 2;
    const CAREGIVER = 3;
    const CHILDCARE = 4;
    const REHAB = 5;


    public static function getMyActiveJobs()
    {
        return Job::join('job_categories','job_categories.id','=','jobs.job_category_id')
        ->select('jobs.*','job_categories.name as job_category_name')
        ->where('employer_id',auth()->user()->id)
        ->where('status',1)
        ->get();
    }
}
