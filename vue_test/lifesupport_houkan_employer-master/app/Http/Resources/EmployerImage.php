<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EmployerImage extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'path'=> '/img/uploads/'.$this->name,
            'dimension' => $this->dimension,
            'resource_id' => $this->resource_id,
            'resource_type' => $this->resource_type,
            'employer_id' => $this->employer_id,
            'recommended_size' => $this->recommended_size,
            'created_at' => isset($this->created_at) && !empty($this->created_at) ? date('Y/m/d',$this->created_at->timestamp) : null,
            'updated_at' => isset($this->created_at) && !empty($this->created_at) ? date('Y/m/d',$this->created_at->timestamp) : null,
        ];
    }
}
