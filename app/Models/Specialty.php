<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
