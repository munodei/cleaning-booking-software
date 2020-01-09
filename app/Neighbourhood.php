<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighbourhood extends Model
{
    protected $table     = 'neighbourhood';
    protected $fillable  = ['id', 'neighbourhood', 'city_id', 'created_at', 'updated_at'];

}
