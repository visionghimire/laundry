<?php

namespace App;


class Inventory extends BaseModel
{
    protected $table = 'stock_list';
    protected $primaryKey = 'id';
    protected $fillable = ['name','price'];
    protected $rules = [
        'name'=>'string|required',
        'price' => 'numeric|required',
        

        ];
}
