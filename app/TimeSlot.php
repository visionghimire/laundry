<?php

namespace App;


class TimeSlot extends BaseModel
{
    protected $table = 'time_slot';
    protected $primaryKey = 'id';
    protected $fillable = ['slot','status'];
    protected $rules = [
        'slot'=>'string|required',
        'status' => 'integer|required',
        

        ];
}
