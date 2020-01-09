<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table    = 'appointments';
    protected $fillable =  ['id','client_id','cleaner_id','address','suburb_id','lat','long','admin_assigned','time_start','time_end','date','period','time_of_day','cost','status','deleted_at','created_at','updated_at'];
}
