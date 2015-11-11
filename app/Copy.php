<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    public function loanItems()
    {
        return $this->hasMany('App\LoanItem');
    }

    public function work()
    {
        return $this->belongsTo('App\Work');
    }
}
