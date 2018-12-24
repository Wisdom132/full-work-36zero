<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'id', 'name', 'slug'
	];

	public function posts(){
		return $this->belongsToMany(Post::class, 'category_posts');
	}

	public static function boot()
	{
		parent::boot();

		static::saving(function($model) {
			$model->slug = str_slug($model->name);

			return true;
		});
	}
}
