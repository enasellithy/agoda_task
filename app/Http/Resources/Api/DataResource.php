<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'hotels' => [
                'id' => $this->hotel_id,
                'name' => $this->hotel_name,
                'geo' => [
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude
                ]
            ]
        ];
    }
}
