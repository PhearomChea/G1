<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
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
            'speed'=>$this->speed,
            'height'=>$this->height,
            'drone_run'=>$this->drone_running,
            'plan'=> new PlaneResource($this->plan),
            'drone'=> new DroneResource($this->drone)
        ];
    }
}
