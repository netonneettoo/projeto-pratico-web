<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class LoanItem extends Model
{
    //loan_id, copy_id, return_prevision
    protected $fillable = [
        'loan_id',
        'copy_id',
        'return_prevision',
        'return_at',
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
        if (@isset($data['return_at']) && $data['return_at'] != null) $obj->return_at = $data['return_at'];
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
}
