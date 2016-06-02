<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\DefaultSetting;
use Auth;

class ApiController extends Controller {

	/**
	 * api/v1/post
	 *
	 * Returns back all posts.
	 *
	 */
	public function posts() {
		return Post::all();
	}

	/**
	 * api/v1/post/{id}
	 *
	 * Returns back a spesific post.
	 *
	 * @param $id
	 */
	public function postWithSpesificId($id) {
		return Post::where('id', $id)->get();
	}

	/**
	 * api/v1/popular/{count}
	 *
	 * Returns back most popular posts.
	 *
	 * @param $count
	 */
	public function popularPosts($count) {
		return Post::popular($count);
	}

	/**
	 * api/v1/user/{name}
	 *
	 * Returns back all posts from a spesific user
	 *
	 * @param $name
	 */
	public function postsFromUser($name) {
		return Post::where('author', $name)->latest()->get();
	}

	/**
	 * api/v1/tag/{name}
	 *
	 * Returns back all posts having a spesific tag
	 *
	 * @param $name 
	 */
	public function postsWithTag($name) {
		return Post::withAnyTag([$name])->latest()->get();
	}

	/**
	 * api/withPagination/posts
	 *
	 * Returns all posts in collection (pagination type)
	 *
	 */
	public function postsWithPagination() {

		$defaults = DefaultSetting::findOrFail(1);
		$orderBy = '';
		$onlyCertified = $defaults['certified'];
		$pagination_count = $defaults['pagination_count'];

		if($defaults['show_first'] == 'show-1') $orderBy = 'id';
        if($defaults['show_first'] == 'show-2') $orderBy = 'updated_at';
        if($defaults['show_first'] == 'show-3') $orderBy = 'certified';
        if($defaults['show_first'] == 'show-4') $orderBy = 'views';

		if(Auth::user()){
			$user = Auth::user();
	        $settings = Setting::findOrFail($user->setting_id);

	        $onlyCertified = $settings['certified'];
	        $pagination_count = $settings['pagination_count'];
	       
	        if($settings['show_first'] == 'show-1') $orderBy = 'id';
	        if($settings['show_first'] == 'show-2') $orderBy = 'updated_at';
	        if($settings['show_first'] == 'show-3') $orderBy = 'certified';
	        if($settings['show_first'] == 'show-4') $orderBy = 'views';
		}

		$results = Post::orderBy($orderBy, 'desc')->paginate($pagination_count);

		$pinToTop = Post::where('pin', '00000')->first(); 

		if($pinToTop) $results = Post::where('pin', '!=' , '00000')->orderBy($orderBy, 'desc')->paginate($pagination_count);
		if($onlyCertified) $results = Post::where('certified', 1)->orderBy($orderBy, 'desc')->paginate($pagination_count);


		$response = [
			'pagination' => [
				'total' => $results->total(),
				'per_page' => $results->perPage(),
				'current_page' => $results->currentPage(),
				'last_page' => $results->lastPage(),
				'from' => $results->firstItem(),
				'to' => $results->lastItem(),
			],
			'data' => $results,
		];

		return $response;
	}

	/**
	 * api/withPagination/user/{name}
	 *
	 * Returns back all posts from a spesific user, in collection (pagination type)
	 *
	 * @param $name
	 */
	public function postsFromSpesificUserWithPagination($name) {
		$results = Post::where('author', $name)->latest()->paginate(5);
		$response = [
			'pagination' => [
				'total' => $results->total(),
				'per_page' => $results->perPage(),
				'current_page' => $results->currentPage(),
				'last_page' => $results->lastPage(),
				'from' => $results->firstItem(),
				'to' => $results->lastItem(),
			],
			'data' => $results,
		];

		return $response;
	}

	/**
	 * api/withPagination/tag/{name}
	 *
	 * Returns back all posts having a spesific tag, in collection (pagination type)
	 *
	 * @param $name
	 */
	public function postsWithSpesificTagWithPagination($name) {
		$results = Post::withAnyTag([$name])->latest()->paginate(5);
		$response = [
			'pagination' => [
				'total' => $results->total(),
				'per_page' => $results->perPage(),
				'current_page' => $results->currentPage(),
				'last_page' => $results->lastPage(),
				'from' => $results->firstItem(),
				'to' => $results->lastItem(),
			],
			'data' => $results,
		];

		return $response;
	}
}
