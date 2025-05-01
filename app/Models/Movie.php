<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'classification',
        'release_date',
        'review',
        'season',
        'is_series',
        'poster_path',
    ];

    protected $casts = [
        'release_date' => 'date',
        'is_series' => 'boolean',
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
