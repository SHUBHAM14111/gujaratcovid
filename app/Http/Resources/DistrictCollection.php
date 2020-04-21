<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
            'type'          => 'districts',
            'id'            => (string)$this->id,
        
                'name' => $this->name,
                'counts' => $this->counts,
                'created' => $this->created_at,
                'updated' => $this->updated_at,
                
            
        ];
    
    }
}