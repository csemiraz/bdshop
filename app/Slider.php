<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
    	'title', 'description', 'link', 'image', 'status'
    ];
}
