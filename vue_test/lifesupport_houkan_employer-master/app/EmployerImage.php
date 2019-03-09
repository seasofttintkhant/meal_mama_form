<?php

namespace App;

use App\Employer;
use App\Facility;
use Illuminate\Database\Eloquent\Model;

class EmployerImage extends Model
{
    protected $guarded = [];
    protected $dateFormat = 'U';
    // Resource Type
    const ResourceFacility= "facility" ; 
    const ResourceJob = "job";
    const ResourceEmployer = "employer";

    public function facilities()
    {
        return $this->belongsTo(Facility::class);
    }

    public function employers()
    {
        return $this->belongsTo(Employer::class);
    }

    public function getImagePathAttribute()
    {
        return asset('/employers/{$this->name}');
    }

    public static function updateEmployerImageforResource($images=[],$resource_id)
    {
        foreach($images as $image)
        {
            $imageIDs[] = $image['id'];
        }
    
        self::whereIn('id',$imageIDs)->update(['resource_id'=>$resource_id]);

    }
}
