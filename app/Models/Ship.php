<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Ship extends Model
{
    protected $connection = 'mongodb';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
