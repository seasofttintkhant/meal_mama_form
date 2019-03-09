<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
{
    public $timestamps = false;

    protected $guarded = [];


    public function getServiceTypesAttribute(){
        $services = array();
   
        if(!empty($this->service_ids))
        {
            $ids_array = explode(',',$this->service_ids);

            $services = ServiceType::whereIn('id',$ids_array)->get();

        }
        
        return $services;
    }
}
