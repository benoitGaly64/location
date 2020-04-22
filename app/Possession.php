<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Possession extends Model
{
    protected $fillable = ['title','description','address','zipCode','town'];

	public function portfolio() 
	{
		return $this->belongsTo('App\Portfolio');
	}

}