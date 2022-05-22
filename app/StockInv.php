<?php

namespace App;


class Stock extends BaseModel
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $fillable = ['supply_id','in_qty','used_qty'];
    protected $rules = [
        'supply_id'=>'integer|required',
        'ramining_qty' => 'numeric|required',
        'used_qty' => 'numeric|nullable',

        ];
}
