<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function copy()
    {
        return $this->hasMany('App\Copy');
    }
}
