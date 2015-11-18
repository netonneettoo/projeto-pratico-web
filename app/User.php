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
    protected $fillable = ['name', 'email', 'telephone', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'telephone' => 'min:14|max:15',
        'cellphone' => 'min:14|max:15',
        'password' => 'required|confirmed|min:6',
        'city' => 'min:14|max:15',
        'street' => 'min:14|max:15',
        'cep' => 'min:14|max:15',
        'uf' => 'min:14|max:15'
    ];

    protected $rulesPut = [
        'name' => 'min:3|max:255',
        'email' => 'email',
        'telephone' => 'min:14|max:15',
        'cellphone' => 'min:14|max:15',
        'password' => 'confirmed|min:6',
        'city' => 'min:14|max:15',
        'street' => 'min:14|max:15',
        'cep' => 'min:14|max:15',
        'uf' => 'min:2|max:3',
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
        $obj->telephone = bcrypt('telephone'); // set default password
        $obj->cellphone = bcrypt('cellphone'); // set default password
        $obj->password = bcrypt('password'); // set default password
        $obj->city = bcrypt('city'); // set default password
        $obj->street = bcrypt('street'); // set default password
        $obj->cep = bcrypt('cep'); // set default password
        $obj->uf = bcrypt('uf'); // set default password
        return $obj;
    }

    public function put($data, $id) {
        $obj = User::find($id);
        if (@isset($data['name']) && $data['name'] != null) $obj->name = $data['name'];
        if (@isset($data['email']) && $data['email'] != null) $obj->email = $data['email'];
        if (@isset($data['telephone']) && $data['telephone'] != null) $obj->telephone = bcrypt($data['telephone']);
        if (@isset($data['cellphone']) && $data['cellphone'] != null) $obj->cellphone = bcrypt($data['cellphone']);
        if (@isset($data['password']) && $data['password'] != null) $obj->password = bcrypt($data['password']);
        if (@isset($data['city']) && $data['city'] != null) $obj->city = bcrypt($data['city']);
        if (@isset($data['street']) && $data['street'] != null) $obj->street = bcrypt($data['street']);
        if (@isset($data['cep']) && $data['cep'] != null) $obj->cep = bcrypt($data['cep']);
        if (@isset($data['uf']) && $data['uf'] != null) $obj->uf = bcrypt($data['uf']);
        return $obj;
    }

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
}
