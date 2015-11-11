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

    public static function getByStatus($status) {
        return self::where('status', $status);
    }

    public static function getAll($status) {
        $all = self::getByStatus($status)->get();
        for($i = 0; $i < count($all); $i++) {
            $all[$i]->user = $all[$i]->user()->first();
            $all[$i]->loanItems = $all[$i]->loanItems()->get();
            unset($all[$i]->user_id);
        }
        return $all;
    }

    public static function getAllByUserName($status, $searchByUserName) {
        $data = array();
        $all = self::getAll($status);
        foreach($all as $loan) {
            if (self::searchByUserName($loan->user->name, $searchByUserName)) {
                $data[] = $loan;
            }
        }
        if (count($data) > 0)
            return $data;
        return $all;
    }

    public static function getLoanActive($id) {
        $obj = Loan::getByStatus(self::STATUS_ACTIVE)->where('id', $id)->first();
        if ($obj == null) {
            return response()->json(array('Not found'));
        }
        $obj->user = $obj->user()->first();
        $obj->loanItems = $obj->loanItems()->get();
        unset($obj->user_id);
        return $obj;
    }

    public static function searchByUserName($userName, $search) {
        if (strpos($userName, $search) !== false)
            return true;
        return false;
    }
}
