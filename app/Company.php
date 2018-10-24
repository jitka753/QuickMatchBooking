<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   // protected $fillable = [
     //   'id_company', 'companyName', 'companyEmail', 'companyPhone', 'companyMobile', 'companyAddress', 
      //  'companyDescription', 'companyWebLink', 'password', 'companyResPerson', 'companyPhoneRP', 'companyEmailRP'
   // ];
    //table name
    protected $table= 'companies';
    //primary key
    public $primaryKey='id_company';

    public $timestamps = false;
    
}
