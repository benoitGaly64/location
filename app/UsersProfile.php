<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    protected $fillable = [
        'address', 'zipcode', 'city','lastname','firstname','gender','phone','date_of_birth','pic_path','user_id'
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
    } 
}
