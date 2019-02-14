<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class member_rolesModel extends Model
{
    //
    
    protected $table = "member_roles";
    protected $fillable = [
    	'role_name','role_token'
    ];
}
