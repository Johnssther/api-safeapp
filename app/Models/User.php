<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;
use Validator;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_users';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_phone', 'user_active', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'username', 'remember_token', 'user_api_token', 'token_firebase'
    ];
    
    /**
     * Function for validate data.
     */
    public function isValid($data)
    {
        $rules = [
            'user_name' => 'required|max:100',
            'user_email' => 'required|max:100',
            'user_phone' => 'required|max:30',
            'user_active' => 'required|max:1',
            'username' => 'required|max:20',
            'password' => 'required|max:60',

        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->errors();
        return false;
    }
}

