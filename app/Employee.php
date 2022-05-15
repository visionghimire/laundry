<?php

namespace App;


class Employee extends BaseModel
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['name','address','contact_number', 'username', 'password'];
    protected $rules = [
        'name'=>'string|required',
        'address' => 'string|required',
        'contact_number'=>'string|required',
        'username' => 'string|required',
        'password'=>'string|required',
        

        ];
}
