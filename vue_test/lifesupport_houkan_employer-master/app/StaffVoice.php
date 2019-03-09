<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffVoice extends Model
{
    protected $dateFormat = 'U';

    protected $guarded = [];

    public function deleteOldImage($dir=null)
    {
    	if(isset($this->image) && !empty($this->image))
		{
	    	$path=$dir.$this->image;
	        if (file_exists($path)) unlink($path);
		}
    }

    public function getUpdateDateAttribute()
    {
        if(isset($this->updated_at) && !empty($this->updated_at)){
            return date('Y/m/d',$this->updated_at->timestamp);
        }
        return null;
    }

    public function getYearsOfExpStrAttribute()
    {
        if(isset($this->years_of_exp) && !empty($this->years_of_exp))
        {
            if($this->years_of_exp == 10)
            {
                return $this->years_of_exp . ' 年以上';
            }
            else
            {
                return $this->years_of_exp . ' 年';
            }
        }

        return null;
    }
}
