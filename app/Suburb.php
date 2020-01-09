<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    protected $table    ='suburbs';
    protected $fillable = ['id', 'suburb_name', 'city_id', 'created_at', 'updated_at'];
}
