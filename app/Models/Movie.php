<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = ['title', 'description', 'poster'];

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'movie_id', 'uuid');
    }
}
