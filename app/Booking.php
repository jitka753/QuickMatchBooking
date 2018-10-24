<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'id_company', 'id_time_slot', 'id_student'
    ];

    protected $primaryKey = 'id_booking';
}
