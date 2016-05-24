<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

	use SoftDeletes;
	use Taggable;

	public $table = 'posts';

	protected $hidden = array('pin');

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['views'];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $fillable = [
		'title',
		'article',
		'author',
		'certified',
		'pin',
		'tags',
		'user_id'
	];

	public static function boot() {
		parent::boot();

		static::created(function ($page) {
			$page->tag(explode(',', $page->attributes['tags']));
		});

		static::updated(function ($page) {
			$page->retag(explode(',', $page->attributes['tags']));
		});
	}

	/**
	 * Scope a query to show the latest posts order by id
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeIdLatest($query){
        return $query->orderBy('id', 'desc')->get();
    }

    /**
	 * Scope a query to include only posts from confirmed users
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeConfirmed($query){
        return $query->where('certified', 1)->orderBy('id', 'desc')->get();
    }

	/**
	 * Scope a query to incude only the top 5 popular posts.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopePopular($query){
        return $query->orderBy('views', 'desc')->take(5)->get();
    }





}
