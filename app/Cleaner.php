<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaner extends Model
{
    protected $table = 'cleaners';
    protected $fillable = ['id', 'id_number', 'email', 'phone','phone1', 'passport_number', 'first_name', 'last_name', 'gender', 'dob', 'rating', 'sys_id', 'country', 'photo', 'deleted_at', 'created_at', 'updated_at'];
}
