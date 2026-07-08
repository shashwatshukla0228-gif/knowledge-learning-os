<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
