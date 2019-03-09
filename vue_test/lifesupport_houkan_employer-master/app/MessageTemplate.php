<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    public static function getMessageTemplates($scout = false)
    {
        $message_templates_tmp = self::where('resource_type',1)->get();
        
       
        $templates = array();
        $jobs = Job::getMyActiveJobs();
        foreach($message_templates_tmp as $message_template)
        {
            if($message_template->type !== 'scout')
            {
               $templates[$message_template->id] = $message_template->title;
            }
         
        }
       foreach($jobs as $job)
       {
            $scout_message = $message_templates_tmp->where('type','scout')->first();

            $id = $job->id.'-'.$scout_message->id;
            $templates[$id] =  $scout_message->title . "($job->employment_type_name/$job->job_category_name)";
            
       }

       return $templates;
       

    }
}
