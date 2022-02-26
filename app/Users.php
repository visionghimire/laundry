<?php

namespace App;


class Users extends BaseModel
{
protected $table = 'users';
protected $hidden=['password'];
    protected $fillable = ['username', 'password','role'];
    protected $rules = [
        'username' => 'string|required',
        'password' => 'min:6|confirmed|required',
         'password_confirmation'=>'required_with:password|min:6|same:password',
         'role'=>'nullable|string',
         //'verification_doc'=>'nullable|string',
        ];
}
