<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable=['name'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function possessions() 
    {
        return $this->hasMany(Possession::class);
    }
}
