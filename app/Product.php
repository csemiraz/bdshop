<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'brand_id', 'supplier_id', 'name', 'description', 'view_count', 'price', 'stock', 'discount', 'image', 'status'
    ];

    public function category ()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
