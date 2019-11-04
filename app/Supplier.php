<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'company', 'address', 'phone', 'email', 'status'
    ];

    public function products ()
    {
        return $this->hasMany('App\Product');
    }
}
