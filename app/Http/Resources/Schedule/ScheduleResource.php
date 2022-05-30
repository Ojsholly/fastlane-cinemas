<?php

namespace App\Http\Resources\Schedule;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\Movie\MovieResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'movie' => new MovieResource($this->whenLoaded('movie')),
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'start_at' => $this->start_at->toDayDateTimeString(),
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
