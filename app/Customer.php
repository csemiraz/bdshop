<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'address'
    ];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function wishListProducts ()
    {
    	return $this->belongsToMany('App\Product')->withTimeStamps();
    }
}
