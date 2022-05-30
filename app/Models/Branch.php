<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = ['location'];

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'branch_id', 'uuid');
    }
}
