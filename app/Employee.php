<?php

namespace App;


class Employee extends BaseModel
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['name','address','contact_number'];
    protected $rules = [
        'name'=>'string|required',
        'address' => 'string|required',
        'contact_number'=>'string|required',
        
        

        ];
}
