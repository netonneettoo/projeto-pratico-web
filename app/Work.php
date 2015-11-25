<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Work extends Model
{
    protected $fillable = ['title', 'publication_year', 'edition', 'price', 'isbn', 'publisher_id', 'work_type_id', 'status'];

    protected $rules = [
        'title'             => 'required|min:3|max:255',
        'publication_year'  => 'required|integer',
        'edition'           => 'required|min:3|max:255',
        'price'             => 'required|numeric',
        'isbn'              => 'required|min:11|max:13',
        'publisher_id'      => 'required|integer',
        'work_type_id'      => 'required|integer',
        'status'            => 'required|in:active,inactive',
    ];

    protected $messages = [];

    public function validate($data) {
        if (array_search($_SERVER['REQUEST_METHOD'], array('PUT', 'PATCH')) != -1) {
            $this->rules = [
                'title'             => 'min:3|max:255',
                'publication_year'  => 'integer',
                'edition'           => 'min:3|max:255',
                'price'             => 'numeric',
                'isbn'              => 'min:11|max:13',
                'publisher_id'      => 'integer',
                'work_type_id'      => 'integer',
                'status'            => 'in:active,inactive',
            ];
        }
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function copy()
    {
        return $this->hasMany('App\Copy');
    }
}
