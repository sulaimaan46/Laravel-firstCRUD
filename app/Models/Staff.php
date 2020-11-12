<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=['id','name','email','phone_number','date_of_birth','designation','salary','address'];
}
