<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $fillable = ['firstname', 'lastname', 'middlename', 'email', 'password', 'height',
    						'gender', 'usertype', 'nutritionist', 'device', 'birthday'];

}
