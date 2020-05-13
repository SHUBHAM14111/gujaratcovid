<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
        
                'lat' => $this->latitude,
                'lng' => $this->longitude,
            
        ];
    
    }
}