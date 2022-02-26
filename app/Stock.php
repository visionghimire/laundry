<?php

namespace App;


class Stock extends BaseModel
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $fillable = ['supply_id','in_qty','used_qty','price'];
    protected $rules = [
        'supply_id'=>'integer|required',
        'in_qty' => 'integer|required',
        'used_qty' => 'integer|nullable',
        'price' => 'integer|required',
        

        ];
}
