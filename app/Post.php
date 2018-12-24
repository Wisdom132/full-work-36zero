<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function categories(){
		return $this->belongsToMany(Category::class, 'category_post')->withTimestamps();
	}

	public static function boot()
	{
		parent::boot();

		static::saving(function($model) {
			$model->slug = str_slug($model->title);

			return true;
		});
	}

	// public function makeSlugFromTitle($title)
	// {
	// 	$slug = Str::slug($title);

	// 	$count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

	// 	return $count ? "{$slug}-{$count}" : $slug;
	// }
}
