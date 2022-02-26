<?php

namespace App;


class LaundryType extends BaseModel
{
    protected $table = 'laundry_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','price'];
    protected $rules = [
        'name'=>'string|required',
        'price' => 'string|required',
        

        ];
}
