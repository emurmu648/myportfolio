<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable =[
        'services_name',
        'services_description',
        'services_image',
        'status'
    ];
}
