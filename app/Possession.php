<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Possession extends Model
{
    protected $fillable = ['title','description','address','zipCode','town'];

	public function portfolio() 
	{
		return $this->belongsTo(Portfolio::class);
	}
	public function owners() 
	{
		return $this->belongsToMany(owner::class);
	}

}
