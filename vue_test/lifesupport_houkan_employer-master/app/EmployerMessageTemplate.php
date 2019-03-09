<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerMessageTemplate extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    public static function getMessageTemplates($scout = false)
    {
        $message_templates =  self::where('employer_id',auth()->user()->id)
        ->where(function($q) use ($scout){
            if($scout)
            {
                $q->where('title','LIKE',"%スカウト%");
            }
        })->get();


        return $message_templates;
    }
}
