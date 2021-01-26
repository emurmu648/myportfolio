<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'about_name',
        'about_description',
        'about_image',
        'Status'
    ];
}
