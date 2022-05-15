<?php

namespace App;


class LaundryType extends BaseModel
{
    protected $table = 'laundry_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['ltype','name','price'];
    protected $rules = [
        'ltype'=>'nullable|integer',
        'name'=>'string|required',
        'price' => 'string|required',
        

        ];
}
