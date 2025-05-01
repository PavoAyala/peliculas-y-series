<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'description',
        'picture_path',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
