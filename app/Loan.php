<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    public function loanItems()
    {
        return $this->hasMany('App\LoanItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getAllByStatus($status) {
        $all = self::where('status', $status)->get();
        for($i = 0; $i < count($all); $i++) {
            $all[$i]->user = $all[$i]->user()->first();
            $all[$i]->loanItems = $all[$i]->loanItems()->get();
            unset($all[$i]->user_id);
        }
        return $all;
    }
}
