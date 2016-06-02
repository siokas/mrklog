<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Setting;
use App\Models\DefaultSetting;
use App\Repositories\PostRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;
use Markdown;

class PostController extends Controller {
	/** @var  PostRepository */
	private $postRepository;

	/**
	 *	In the constructor we initialize the postRepo variable and attach the
	 *	update_auth middleweare to the edit function 
	 */
	public function __construct(PostRepository $postRepo) {
		$this->postRepository = $postRepo;
		$this->middleware('update_auth' ,['only' => 'edit']);
	}

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request) {
		// Get the previous url from the request and create empty variables
		$pre_url = $request->session()->all()['_previous']['url'];
		$content = ''; // This is for the Vue JS to know what content should display
		$tag = ''; // This is the tag name (only if the $content is 'tag')
		$user = ''; // This is the user name (only if the $content is 'user')

		// If the redirect came from the user or tag link initiate the variables accordingly
		if(strpos($pre_url, 'user')){
			$content = 'user'; 
			$user = explode('user/', $pre_url)[1]; 

		}elseif(strpos($pre_url, 'tag')){
			$content = 'tag';
			$tag = explode('tag/', $pre_url)[1];
		}

		// Default Settings if there is no user loged in
		$settings = ['pagination_type'=> 0, 'tags'=> 1, 'date_format' => 'LL'];

		if(\Auth::user()){
			$user = \Auth::user();
	        $settings = Setting::findOrFail($user->setting_id);
		}
		
		$pinToTop = Post::where('pin', '00000')->first();
		

		// Finally return the view with all the data
		return view('pages.main')
		->withPage('main') // This is for the blade template in order to know which section to load
		->with('content', $content)
		->with('tag', $tag)
		->with('user', $user)
		->with('pinToTop', $pinToTop)
		->withSettings($settings);
	}

	/**
	 * Show the form for creating a new Post.
	 *
	 * @return Response
	 */
	public function create() {
		// Just return the view with page data
		return view('pages.create')->withPage('create');
	}

	/**
	 * Store a newly created Post in storage.
	 *
	 * @param PostRequest $request
	 *
	 * @return Response
	 */
	public function store(PostRequest $request) {

		// Get everything from request and seperate the article into an array of different lines
		$input = $request->all();
		$lines = explode("\n", $input['article']);

		// Get the tags from request and the title from the first line of the article
		if($request->tags) $input['tags'] = $request->tags;
		
		$input['title'] = $lines[0];

		/**
		 * 	If there is a logged in user:
		 *	1. Change the certified attribute to 1
		 *	2. Make the author attribute to match the user's name
		 *	3. Do not assign a pin
		 *
		 *	Otherwise:
		 *	1. Take the author's name from the last line (Should be inserted as "Author: {name}")
		 *	2. If there is not such a line just assign the author attribute to Anonymous
		 *	3. Create a 5 character random string for pin
		 * 
		 */	
		if ($request->user()) {
			if($request->user()->confirmed == 1) $input['certified'] = 1;
			$input['author'] = \Auth::user()->name;
			$input['user_id'] = \Auth::user()->id;
			$input['pin'] = 0;
		} else {
			$author_line = explode("\n", $input['article']);
			if(is_numeric(strpos($lines[count($lines) -1], "Author:"))){
				$author = explode(": ", $lines[count($lines) -1]);
				$author_name = $author[1];
				$input['author'] = $author_name;
			}else $input['author'] = 'Anonymous';

			$input['pin'] = str_random(5);
		}

		// For testing purposes only
		if($input['title'] == 'Test' && $input['article'] == 'Test' && $input['author'] == 'Anonymous' && $input['tags'] == "testTag")
			$input['pin'] = 'abcde';

		// Save the post calling the repository's create() method 
		$post = $this->postRepository->create($input);

		// Flash a message with the pin (only if the user was guest)
		if(!$request->user())
			Flash::success('Post saved successfully. Your pin code is: ' . $input['pin'] . '. Please keep this code in order to update or delete your post.');
		else
			Flash::success('Post saved successfully');

		return redirect(route('posts.index'));
	}

	/**
	 * Display the specified Post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		// Get the post from its id
		$post = $this->postRepository->find($id);

		// If there is not a post with that id redirect to home and display an error message
		if (empty($post)) {
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		// Increase the post views variable and save it into the database
		if(!\Auth::user()) $post->views++;
		else if(\Auth::user()->name != $post->author) $post->views++;
		
		$post->save(); 

		$title = Markdown::convertToHtml($post->title);
		$textTitle = explode("\n", strip_tags($title));

		// Convert the article from markdown to simple html
		$article = Markdown::convertToHtml($post->article); 
		
		// Return the view passing the necessary data
		return view('pages.article')->withPost($post)->withPage('article')->withArticle($article)->withTitle($textTitle[0]);
	}

	/**
	 * Show the form for editing the specified Post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		// Get the post from its id
		$post = $this->postRepository->find($id);
		// Get all the tags of the post in order to pass them to the Vue JS app
		$tags = '';
		foreach($post->tags as $tag) {
    		$tags .= $tag->name . ',';
		}

		// If there is not a post with that id redirect to home and display an error message
		if (empty($post)) {
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		// Otherwise just return the view passing the necessary data
		return view('pages.edit')->withPost($post)->withPage('edit')->withTags($tags);
	}

	/**
	 * Update the specified Post in storage.
	 *
	 * @param  int              $id
	 * @param PostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, PostRequest $request) {
		// Get the post from its id and everything from request
		$post = $this->postRepository->find($id);
		$input = $request->all();

		// If there is not a post with that id redirect to home and display an error message
		if (empty($post)) {
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		// Seperate the article into an array of different lines
		// and get the tags from request and the title from the first line of the article
		$lines = explode("\n", $input['article']);
		$input['title'] = $lines[0];
		$input['tags'] = $request->tags;

		/**
		 * 	If there is NOT a logged in user:
		 *	1. Take the author's name from the last line (Should be inserted as "Author: {name}")
		 *	2. If there is not such a line just assign the author attribute to Anonymous
		 */	
		if (!$request->user()) {
			$author_line = explode("\n", $input['article']);
			if(is_numeric(strpos($author_line[count($author_line) -1], "Author:"))){
				$author = explode(": ", $author_line[count($author_line) -1]);
				$author_name = $author[1];
				$input['author'] = $author_name;
			}else $author_name = 'Anonymous';
		}

		// Update the post calling the postRepository's update() method
		$post = $this->postRepository->update($input, $id);

		// Flash a success message
		Flash::success('Post updated successfully.');

		// Redirect to the post giving the id of the post
		return redirect(route('posts.show', [$id]));
	}

	/**
	 * Remove the specified Post from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		// Get the post from its id
		$post = $this->postRepository->find($id);

		// If there is not a post with that id redirect to home and display an error message
		if (empty($post)) {
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		// Delete the post calling the postRepository's delete() method
		$this->postRepository->delete($id);

		// Flash a success message
		Flash::success('Post deleted successfully.');

		// Redirect to the home page
		return redirect(route('posts.index'));
	}

}
