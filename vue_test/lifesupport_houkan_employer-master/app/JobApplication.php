<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $dateFormat = 'U';

    protected $guarded = [];


    public static $ongoing_statuses =[
        1 => '応募済',
        2 => '書類選考中',
        3 => '面接日設定済',
        4 => '面接実施中',
        5 => '内定済',
        6 => '内定承諾済',
        7 => '入職日決定済',
    ];

    public static $done_statuses =[
        8 => '入職済',
        9 => '不採用',
        10 => '内定辞退',
        11 => '選考終了・離脱'
    ];

    public function getApplicationStatusStr()
    {
        if(array_key_exists ($this->status,self::$ongoing_statuses))
        {
            return self::$ongoing_statuses[$this->status];
        }
        elseif(array_key_exists ($this->status,self::$done_statuses))
        {
            return self::$done_statuses[$this->status];
        }
        return null;
    }

    public static function get_ongoing_keys()
    {
        return array_keys(self::$ongoing_statuses);
    }

    public static function get_done_keys()
    {
        return array_keys(self::$done_statuses);
    }


}

