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
            'street_address' => $this->street_address,
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


          

            if(isset($jobseeker->last_name) && !empty($jobseeker->last_name))
            {   
                $name = $jobseeker->last_name;
                if(isset($jobseeker->first_name) && !empty($jobseeker->first_name))
                {
                    $name .= " " .$jobseeker->first_name;
                }

                $data['full_name'] = $name;
            }
            if(isset($jobseeker->last_kana) && !empty($jobseeker->last_kana))
            {   
                $name_kana = $jobseeker->last_kana;
                if(isset($jobseeker->first_kana) && !empty($jobseeker->first_kana))
                {
                    $name_kana .= " " .$jobseeker->first_kana;
                }
                $data['full_name_kana']=$name_kana;

            }
          
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
            $data['prefecture']= $prefecture;
            $data['cit']= $city_name;
            $data['short_address']= $short_address;


            if(isset($jobseeker->desired_occupation) && !empty($jobseeker->desired_occupation))
            {
                $desired_occupations = [];
                $desired_occupation_arr = json_decode($jobseeker->desired_occupation,true);
                foreach($desired_occupation_arr as $desired_occupation)
                {   
                    $job_category =  $job_categories->filter(function($job_category) use ($desired_occupation){
                        return $job_category->id == $desired_occupation['desired_occupation_id'];
                    })->first();


                    if(isset($job_category) && !empty($job_category))
                    {
                        $job_category_name = $job_category->name;
                        if(isset($desired_occupation['desired_occupation_experience']) && !empty($desired_occupation['desired_occupation_experience']))
                        {   

                            if($desired_occupation['desired_occupation_experience'] >= 10)
                            {
                                $year = '以上';
                            }
                            
                            $job_category_name.="(".$desired_occupation['desired_occupation_experience']."$year)";
                        }
                        $desired_occupations[]= $job_category_name;
                    }
              

                  
                    
                }

                $data['desired_occupations'] = $desired_occupations;
            }

            if(isset($jobseeker->desire_features) && !empty($jobseeker->desire_features))
            {
                $desire_features_arr = explode($jobseeker->desire_features);

                if(!empty($desire_features_arr)){
                    $features = Feature::whereIn('id',$desire_features_arr)->pluck('name')->toArray();
                    $data['desire_features'] = $features;
                 
                }   
          

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

                    $desired_workplaces[] = $short_address;

                 
                }         
                $data['desired_workplaces'] =  $desired_workplaces;
            }

            if(isset($jobseeker->qualification) && !empty($jobseeker->qualification))
            {
                $qualification_arr = json_decode($jobseeker->qualification,true);
                $employee_qualifications = array();
                foreach($qualification_arr as $qualification_data)
                {   
                    $qualification= $qualification_name= null;
                    $qualification=  $qualifications->filter(function($qualification) use ($qualification_data){
                        return $qualification->id == $qualification_data['qualification_id'];
                    })->first();
                    if(isset($qualification) && !empty($qualification))
                    {
                        $qualification_name = $qualification->name;

                        
                        if(isset($qualification_data['qualification_year']) && !empty($qualification_data['qualification_year'])){
                            $qualification_name.="(".$qualification_data['qualification_year']."年)";
                        }

                        $employee_qualifications[] = $qualification_name;
                    } 
                }  

                $data['qualification'] = $employee_qualifications;
            }   

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
                        $data['desired_employment_types'] = $desired_employment_types;
                    }
                 
                }

                if(isset($jobseeker->final_education) && !empty($jobseeker->final_education))
                {
                    if(array_key_exists($jobseeker->final_education,config('custom.final_educations')))
                    {
                        $final_education_str = "(".config('custom.final_educations')[$jobseeker->final_education].")";
                        $data['final_education'] = $final_education_str;
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
                        $month = $date_arr[1].'月';
                    }
                    
                    
                }
                if(isset($jobseeker->graduation_category) && !empty($jobseeker->graduation_category))
                {
                    if(array_key_exists($jobseeker->graduation_category,config('custom.graduation_categories')))
                    {
                        $graduation_category_str = config('custom.graduation_categories')[$jobseeker->graduation_category];
                    }
                }
                if(isset($jobseeker->career_history) && !empty($jobseeker->career_history))
                { 
                    $career_data=[
                        'start_working_date' =>null,
                        'end_working_date' => null,
                        'office_name' =>  null,
                        'facility_category_name' =>  null,
                        'service_types' => [],
                        'current_employment_type' => null, 
                        'job_category_name' => null,
                        'job_description' => null,
                        'position' => null,
                        'salary_type' => null,
                        'salary_amount' => null,
                    ];
                    $career_histories = json_decode($jobseeker->career_history,true);
                    $career_data_arr = [];
                    foreach($career_histories as $career_history)
                    {
                        if(isset($career_history['start_working_date']) && !empty($career_history['start_working_date']))
                        {
                            $start_working_date = explode("-", $career_history['start_working_date']);
                            if((isset($start_working_date[0]) && !empty($start_working_date[0])) && (isset($start_working_date[1]) & !empty($start_working_date[1]))){
                        
                                $career_history['start_working_year'] = $start_working_date[0];
                                $career_history['start_working_month']  = $start_working_date[1];
                                $full_startworking_date  = $start_working_date[0].'年'. $start_working_date[1].'月';

                                $career_data['start_working_date']= $full_startworking_date;
                            }

                        } 
                        if(isset($career_history['end_working_date']) && !empty($career_history['end_working_date']))
                        {
                            $end_working_date = explode("-", $career_history['end_working_date']);
                            if((isset($end_working_date[0]) && !empty($end_working_date[0])) && (isset($end_working_date[1]) & !empty($end_working_date[1]))){
                        
                                $career_history['end_working_year'] = $end_working_date[0];
                                $career_history['end_working_month']  = $end_working_date[1];
                                $full_endworking_date  = $end_working_date[0].'年'. $end_working_date[1].'月';

                                $career_data['end_working_date']= $full_endworking_date;
                            }
                        } 
                        if(isset($career_history['office_name']) && !empty($career_history['office_name']))
                        {
                            $career_data['office_name']= $career_history['office_name'];

                        } 
                        if(isset($career_history['facility_category_id']) && !empty($career_history['facility_category_id']))
                        {
                            $facility_category =  $facility_categories->filter(function($facility_category) use ($career_history){
                                return $facility_category->id == $career_history['facility_category_id'];
                            })->first();
                            $facility_category_name = null;
                            if(isset($facility_category) && !empty($facility_category))
                            {
                                $facility_category_name =$facility_category->name ;
                                $career_data['facility_category_name'] = $facility_category_name;
                            }
                           
                        } 
                        if(isset($career_history['current_employment_type']) && !empty($career_history['current_employment_type']))
                        {
                            if(array_key_exists($career_history['current_employment_type'],config('custom.employment_type')))
                            {
                                 $current_employment_type = config('custom.employment_type')[$career_history['current_employment_type']];
                                 $career_data['current_employment_type'] =$current_employment_type;
                            }
                            
                        } 
                        if(isset($career_history['job_category']) && !empty($career_history['job_category']))
                        {
                            $job_category =  $job_categories->filter(function($job_category) use ($career_history){
                                return $job_category->id == $career_history['job_category'];
                            })->first();

                            if(isset($job_category) && !empty($job_category))
                            {
                                $job_category_name =$job_category->name ;
                                $career_data['job_category_name'] =$job_category_name;
                            }
                        } 
                        if(isset($career_history['job_description']) && !empty($career_history['job_description']))
                        {
                            $career_data['job_description'] =$career_history['job_description'];
                        } 
                        if(isset($career_history['position']) && !empty($career_history['position']))
                        {
                            if(array_key_exists($career_history['position'],config('custom.positions')))
                            {
                                 $position = config('custom.positions')[$career_history['position']];
                                 $career_data['position'] =$position;
                            }
                        } 
                        if(isset($career_history['salary_type']) && !empty($career_history['salary_type']))
                        {
                            if(array_key_exists($career_history['salary_type'],config('custom.salary_types')))
                            {
                                 $position = config('custom.salary_types')[$career_history['salary_type']];
                                 $career_data['salary_type'] =$position;
                            }

                        } 
                        if(isset($career_history['salary_amount']) && !empty($career_history['salary_amount']))
                        {
                            $career_data['salary_amount'] =$career_history['salary_amount'];
                        } 
                        $career_data_arr[] = $career_data;
                    }
                    $data['career_history'] = $career_data_arr;
                }

               
                if(isset($jobseeker->employment_situation) && !empty($jobseeker->employment_situation))
                {
                    if(array_key_exists($jobseeker->employment_situation,config('custom.employment_situation')))
                    {
         
                        $data['employment_situation']  = config('custom.employment_situation')[$jobseeker->employment_situation];
                    }
                }

                $graduation_description = $year.$month. $graduation_category_str;
                if(isset($graduation_description) && !empty($graduation_description))
                {
                    $data['graduation_description'] ="(".$graduation_description.")";
                }   
            

         return $data;
    }
}
