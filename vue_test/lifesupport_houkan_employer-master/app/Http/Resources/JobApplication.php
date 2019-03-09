<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Prefecture;
use App\City;
use App\Feature;
use App\JobCategory;
use App\Qualification;
use App\FacilityCategory;

class Employee extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $jobseeker = $this;
        $data = [
            'id' => $this->id,   
            'employee_id' => $this->employee_id,
            'full_name' => "",
            'full_name_kana' => "",
            'birthday' => $this->birthday,
            'age' => $this->age,
            'email' => $this->email,
            'memo' => $this->memo,
            'password' => $this->password,
            'gender' => $this->gender == 1 ? '男性' : '女性' ,
            'phone' => $this->phone,
            'zip' => $this->zip,
            'full_address' =>"",
            'short_address' =>"",
            'building' => $this->building,
            'address_phonetic' => $this->address_phonetic,
            'spouse' => $this->spouse,
            'final_education' => $this->final_education,
            'desired_salary' => $this->desired_salary,
            'school_name' => $this->school_name,
            'faculty_department' => $this->faculty_department,
            'major' => $this->major,
            'graduation_date' => $this->graduation_date,
            'career_history' => "",
            'profile_image_name' => $this->profile_image_name,
            'self_introduction' => $this->self_introduction,
            'registration_reasons' => $this->registration_reasons,
            'time_to_enter_job' => $this->time_to_enter_job,
            'job_change_and_support' => $this->job_change_and_support,
            'last_login' => isset($this->last_login) && !empty($this->last_login) ? date('Y/m/d H:i',$this->last_login) : "", 
            'created_at' =>isset($this->created_at) && !empty($this->created_at) ? date('Y/m/d',$this->created_at->timestamp) : "",
            'updated_at' => isset($this->updated_at) && !empty($this->updated_at) ? date('Y/m/d',$this->updated_at->timestamp) : "",
         
        ];
        
        $prefectures = Prefecture::getAllPrefectures();
        $cities = City::getAllCities();
        $qualifications = Qualification::all();
        $job_categories = JobCategory::where('deleted_flag',0)->get();
        $facility_categories = FacilityCategory::all();
        $city= $prefecture = $short_address = $prefecture_name = $city_name= null;
        $year = '年';

            

         return $data;
    }
}
