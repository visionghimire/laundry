<?php

namespace App;


class Clock extends BaseModel
{
    protected $table = 'clock';
    protected $primaryKey = 'id';
    protected $fillable = ['emp_id','type','timestmp'];
    protected $rules = [
        'emp_id'=>'integer|required',
        'type' => 'string|required',
        'timestmp'=>'string|required',
        
        ];
}
