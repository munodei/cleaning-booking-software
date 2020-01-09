<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table    = 'jobs';
    protected $fillable = ['id', 'appointment_id', 'service_id', 'created_at', 'updated_at'];
}
