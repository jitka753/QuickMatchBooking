<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyEvent extends Model
{
    protected $table= 'company_events';
    //primary key
    public $primaryKey='id_company_event';
}
