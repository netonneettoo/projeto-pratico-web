<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Validator;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6'
    ];

    protected $rulesPut = [
        'name' => 'min:3|max:255',
        'email' => 'email',
        'password' => 'confirmed|min:6'
    ];

    protected $messages = [
        //
    ];

    protected $messagesPut = [
        //
    ];

    public function validate($data) {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function validatePut($data) {
        return Validator::make($data, $this->rulesPut, $this->messagesPut);
    }

    public function store($data) {
        $obj = new User();
        $obj->name = $data['name'];
        $obj->email = $data['email'];
        $obj->password = bcrypt('default'); // set default password
        return $obj;
    }

    public function put($data, $id) {
        $obj = User::find($id);
        if (@isset($data['name']) && $data['name'] != null) $obj->name = $data['name'];
        if (@isset($data['email']) && $data['email'] != null) $obj->email = $data['email'];
        if (@isset($data['password']) && $data['password'] != null) $obj->password = bcrypt($data['password']);
        return $obj;
    }
}
