<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    public function loanItems()
    {
        return $this->belongsTo('App\LoanItem');
    }
}
