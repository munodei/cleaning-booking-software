<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table    = 'packages';
    protected $fillable = ['id', 'package_name', 'package_slug', 'package_description', 'cost', 'deleted_at', 'created_at', 'updated_at'];
}
