<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table    = 'locations';
    protected $fillable = ['id', 'user_id', 'address', 'suburb', 'neighbourhood', 'city', 'state', 'country', 'suburb_id', 'deleted_at', 'created_at', 'updated_at'];
}
