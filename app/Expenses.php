<?php

namespace App;


class Expenses extends BaseModel
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    protected $fillable = ['years','months','type','price'];
    protected $rules = [
        'years'=>'integer|required',
        'months' => 'integer|required',
        'type' => 'string|required',
        'price' => 'numeric|required',
        

        ];
}
