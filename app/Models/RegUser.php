<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegUser extends Model
{
    protected $fillable=['id','name','email','password','phone_number','date_of_birth','address'];
}
