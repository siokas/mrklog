<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Auth;

class ApiController extends Controller {

	/**
	 * post
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
	 */
	public function posts() {
		return Post::all();
	}

	/**
	 * api/post/{id}
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
	 */
	public function postWithSpesificId($id) {
		return Post::where('id', $id)->get();
	}

	/**
	 * api/popular
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
	 */
	public function popularPosts() {
		return Post::popular();
	}

	/**
	 * This is the short description
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
	 */
	public function postsWithPagination() {
		$orderBy = '';
		$onlyCertified = false;
		$pagination_count = 5;

		if(Auth::user()){
			$user = Auth::user();
	        $settings = Setting::findOrFail($user->setting_id);

	        $onlyCertified = $settings['certified'];
	        $pagination_count = $settings['pagination_count'];
	       
	        if($settings['show_first'] == 'show-1') $orderBy = 'id';
	        if($settings['show_first'] == 'show-2') $orderBy = 'updated_at';
	        if($settings['show_first'] == 'show-3') $orderBy = 'certified';
	        if($settings['show_first'] == 'show-4') $orderBy = 'views';
		}else $orderBy = 'id';

		$results = Post::orderBy($orderBy, 'desc')->paginate($pagination_count);
		
		if($onlyCertified){
			$results = Post::where('certified', 1)->orderBy($orderBy, 'desc')->paginate($pagination_count);
		}

		
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
	 * This is the short description
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
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
	 * This is the short description
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
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
