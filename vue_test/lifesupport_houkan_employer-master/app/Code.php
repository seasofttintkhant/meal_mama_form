<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\EmployeeJobMail;

class Code extends Model
{
    public static function send_employer_registration_to_employer(Employer $employer)
    {
        $data = $employer->toArray();
        try{
            Mail::send('email.employer_registration_to_employer',$data, function($message) use($data){
                $message->to($data['email'])->subject('【訪看Job】ご利用のお申し込みを承りました');
                $message->setEncoder(new \Swift_Mime_ContentEncoder_PlainContentEncoder('8bit'));

            });
        }catch(Exceptin $e)
        {
            echo "Error";
        }
    }
    public static function send_employer_registration_to_operator(Employer $employer)
    {
        $data = $employer->toArray();
        try{
            Mail::send('email.employer_registration_to_operator',$data, function($message) use($data){
                $message->to(config('custom.operator_email'))->subject('【訪看Job】ご利用のお申し込みを承りました');
                $message->setEncoder(new \Swift_Mime_ContentEncoder_PlainContentEncoder('8bit'));

            });
        }catch(Exceptin $e)
        {
            echo "Error";
        }
    }

    public static function send_new_job_notification_to_employers(Job $job)
    {
            $employees =Employee::where(function($q) use ($job){
                $facility=Facility::find($job->facility_id);

                $q->orWhereRaw('JSON_CONTAINS(desired_workplace, \'{"prefered_prefecture_id": "'.$facility->prefecture_id.'"}\')');
                $q->orWhereRaw('JSON_CONTAINS(desired_workplace, \'{"prefered_city_id": "'.$facility->city_id.'"}\')');
                $q->orWhereRaw("FIND_IN_SET(desired_employment_type,$job->employment_type)"); 

                if(isset($job->job_offer_salary_regular_min) && !empty($job->job_offer_salary_regular_min) && is_numeric($job->job_offer_salary_regular_min))
                {
                    $q->orWhere(\DB::raw("CONCAT(desired_salary,'0000')"),'>=',$job->job_offer_salary_regular_min); 
                }
                if(isset($job->job_offer_salary_contract_min) && !empty($job->job_offer_salary_contract_min) && is_numeric($job->job_offer_salary_contract_min))
                {
                    $q->orWhere(\DB::raw("CONCAT(desired_salary,'0000')"),'>=',$job->job_offer_salary_contract_min);
                }
                if(isset($job->job_offer_salary_part_min) && !empty($job->job_offer_salary_part_min) && is_numeric($job->job_offer_salary_part_min))
                {
                    $q->orWhere(\DB::raw("CONCAT(desired_salary,'0000')"),'>=',$job->job_offer_salary_part_min); 
                }
            })->WhereRaw("NOT FIND_IN_SET(blocked_employers,$job->employer_id)")
            ->WhereRaw('JSON_CONTAINS(desired_occupation, \'{"desired_occupation_id": "'.$job->job_category_id.'"}\')')
            ->get();

            if(isset($employees) && !empty($employees))
            {
                $job_data = $job->toArray();
                foreach($employees as $employee)
                {
                    $job_data['employee']= $employee;
                    Mail::to($employee)->queue(new EmployeeJobMail($job_data,$employee->email));
                }
            }
           
    }   

    public static function generateRandomString($length = 18) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function send_password_reset_email($id,$email,$token)
    {


        $data = [
            'url' =>  url('/')."/reset-password/".$id.'/'.hash('md5', $token)
        ];
        
        try{
            Mail::send('email.employer_password_reset',$data, function($message) use($email) {
                $message->to($email)->subject("RESET PASSWORD!");
                $message->setEncoder(new \Swift_Mime_ContentEncoder_PlainContentEncoder('8bit'));
            });
        }catch(Exceptin $e)
        {
            echo "Error";
        }
    }
}
