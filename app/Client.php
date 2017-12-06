<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $primaryKey = 'clients_id';
    protected $fillable = ['name', 'gender', 'dob', 'phone', 'email', 'address', 'nationality', 'education', 'preferred_contact_mode'];
}
