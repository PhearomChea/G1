<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaneResource extends JsonResource
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
            'plan_name'=>$this->plan_name,
            'date_time'=>$this->date_time,
            'user'=> new UserResource($this->user),
            'farm'=> new FarmResource($this->farm)
        ];
    }
}
