<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\Schedule\ScheduleResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class MovieResource extends JsonResource
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
            'title' => Str::ucfirst($this->title),
            'description' => $this->description,
            'poster' => $this->poster,
            'schedules' => new ScheduleResourceCollection($this->whenLoaded('schedules')),
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
