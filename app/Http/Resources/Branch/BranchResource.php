<?php

namespace App\Http\Resources\Branch;

use App\Http\Resources\Schedule\ScheduleResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'location' => Str::ucfirst($this->location),
            'schedules' => new ScheduleResourceCollection($this->whenLoaded('schedules')),
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at->diffForHumans()
        ];
    }
}
