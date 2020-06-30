<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    protected $fillable=[
        'gender','
        lastname',
        'firstname',  
        'email',
        'address',
        'zipcode',
        'city',
        'phone',
        'date_of_birth'
    ];
    public function possessions() 
	{
		return $this->belongsToMany(possession::class);
	}
}
