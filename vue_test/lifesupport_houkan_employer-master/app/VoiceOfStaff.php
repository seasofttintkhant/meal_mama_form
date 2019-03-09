<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoiceOfStaff extends Model
{
    protected $fillable = [
        'role', 'years_of_exp', 'image', 'question_1', 'answer_1', 'question_2', 
        'answer_2', 'question_3', 'answer_3', 'job_category_id'
    ];
}
