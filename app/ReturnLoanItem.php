<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ReturnLoanItem extends Model
{
    protected $fillable = [
        'loan_item_id'
    ];

    protected $rules = [
        'loan_item_id'      => 'required|integer'
    ];

    protected $messages = [
        //
    ];

    public function validate($data) {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function store($data) {
        $obj = new ReturnLoanItem();
        $obj->loan_item_id      = $data['loan_item_id'];
        return $obj;
    }
}
