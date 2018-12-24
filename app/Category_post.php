<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
     protected $fillable = [
    	'category_id', 'post_id'
    ];
}
