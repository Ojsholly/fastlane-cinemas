<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = ['movie_id', 'branch_id', 'start_at'];

    protected $casts = [
      'start_at' => 'datetime'
    ];

    protected $with = ['branch'];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'uuid');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'uuid');
    }
}
