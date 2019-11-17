<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function shipping()
    {
    	return $this->belongsTo('App\Shipping');
    }

    public function payment()
    {
    	return $this->hasOne('App\Payment');
    }
}
