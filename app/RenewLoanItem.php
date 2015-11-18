<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RenewLoanItem extends Model
{
    protected $fillable = [
        'loan_item_id',
        'return_prevision'
    ];

    protected $rules = [
        'loan_item_id'      => 'required|integer',
        'return_prevision'  => 'required|datetime'
    ];

    protected $messages = [
        //
    ];

    public function validate($data) {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function store($data) {
        $obj = new RenewLoanItem();
        $obj->loan_item_id      = $data['loan_item_id'];
        $obj->return_prevision  = $data['return_prevision'];
        return $obj;
    }
}
