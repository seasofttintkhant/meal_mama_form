<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Announcement extends Resource
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
            "title" => $this->title,
            "body" => $this->body,
            "date" => isset($this->updated_at) && !empty($this->updated_at) ? date('Y/m/d H:i',$this->updated_at->timestamp) : "",
        ];
    }
}
