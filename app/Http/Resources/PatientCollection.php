<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientCollection extends JsonResource
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
            'type'          => 'patients',
            'id'            => (string)$this->id,
        
                'name' => $this->name,
                'address' => $this->address,
                'created' => $this->created_at,
                'updated' => $this->updated_at,
                'lat' => $this->latitude,
                'lng' => $this->longitude,
            
        ];
    
    }
}