<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table    = "services";
    protected $fillable = ['id', 'category_id', 'service', 'service_description', 'service_slug', 'service_image', 'price', 'created_at', 'updated_at'];
}
