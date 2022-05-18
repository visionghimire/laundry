<?php

namespace App;


class Booking extends BaseModel
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $fillable = ['type','service_type','unit','fullname','email','phone','pickupdate','timeslot','address','city'];
    protected $rules = [
        'type'=>'integer|required',
        'service_type' => 'string|required',
        'unit'=>'integer|required',
        'fullname' => 'string|required',
        'email'=>'string|required',
        'phone' => 'string|required',
        'pickupdate' => 'string|required',
        'timeslot' => 'string|required',
        'address' => 'string|required',
        'city' => 'string|required',
        

        ];
}
