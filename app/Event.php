<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'events';
    //primary key
    public $primaryKey='id_event';

    public $timestamps = false;
    protected $dates = ['eventDate'];

}
