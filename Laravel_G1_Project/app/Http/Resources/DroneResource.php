<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'drone_id' => $this->drone_id,
            'type_of_drone' => $this->type_of_drone,
            'battery' => $this->battery,
            'parload_capacity' => $this->payload_capacity,
            'date_time' => $this->date_time,
            'locations' => new LocationResource($this->location)
        ];
    }
}
