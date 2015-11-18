<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class LoanItem extends Model
{
    protected $fillable = [
        'loan_id',
        'copy_id',
        'return_prevision',
        'returned_at',
    ];

    protected $rules = [
        'loan_id' => 'required|integer',
        'copy_id' => 'required|integer'
    ];

    protected $messages = [
        //
    ];

    public function validate($data) {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function store($data) {
        $obj = new LoanItem();
        $obj->loan_id           = $data['loan_id'];
        $obj->copy_id           = $data['copy_id'];
        $obj->return_prevision  = $data['return_prevision'];
        if (@isset($data['returned_at']) && $data['returned_at'] != null) $obj->returned_at = $data['returned_at'];
        return $obj;
    }

    public function loan()
    {
        return $this->belongsTo('App\Loan');
    }

    public function copy()
    {
        return $this->belongsTo('App\Copy');
    }

    public static function findLoanItem($id) {
        $loanItem = LoanItem::find($id);

//        $loanItem->loan = $loanItem->loan()->first();
//        unset($loanItem->loan_id);
//
//        $loanItem->loan->user = $loanItem->loan->user()->first();
//        unset($loanItem->loan->user_id);
//
//        $loanItem->copy = $loanItem->copy()->first();
//        unset($loanItem->copy_id);
//
//        $loanItem->copy->work = $loanItem->copy->work()->first();
//        unset($loanItem->copy->work_id);

        return $loanItem;
    }
}
