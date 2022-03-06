<?php

namespace App;


class Booking extends BaseModel
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['name','address','contact_number','clock_in','clock_out','availability'];
    protected $rules = [
        'name'=>'string|required',
        'address' => 'string|required',
        'contact_number'=>'string|required',
        'clock_in' => 'string|required',
        'clock_out'=>'string|required',
        'availability' => 'string|required',
        

        ];
}
