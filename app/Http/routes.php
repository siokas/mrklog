<?php

use App\Models\Post;
use App\Models\Setting;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| There is a route resource for the posts (index, create, store, show, edit, update, destroy)
| and one of each for contact, about, pin and terms pages
|
 */
Route::resource('posts', 'PostController');
Route::get('about', 'AppController@about');
Route::get('contact', 'AppController@contact');
Route::get('settings', 'AppController@settings');
Route::get('pin/{id}', 'AppController@pin');
Route::get('terms', 'AppController@terms');
Route::get('mail/resend', 'AppController@resend_code');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
|
| Default auth() routes, AuthProvider and callbacks for signing in with social networks
| and a route callback for email confirmation
 */
Route::auth();
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('register/verify/{confirmationCode}', [
	'as' => 'confirmation_path',
	'uses' => 'ConfirmationController@confirm',
]);
Route::delete('user/delete', 'AppController@delete_account')->name('user.delete');


/*
|--------------------------------------------------------------------------
| Post routes
|--------------------------------------------------------------------------
|
| One route for editing the post, one for sending contact email and and another one for saving the user's settings
| (Warning: There are more post routes but they are included in the article post resource route)
|
 */
Route::post('posts/{id}/edit', 'PostController@edit');
Route::post('send', 'MessageController@send')->name('send.message');
Route::post('settings', 'AppController@save_settings')->name('save.settings');

/*
|--------------------------------------------------------------------------
| Redirect routes
|--------------------------------------------------------------------------
|
| Redirect the home page to go to /posts page, the register to go to the login page
| and searching tags and users should redirect to home page in order to display the posts
| 
 */
Route::get('/', function () {
	return redirect('/posts');
});

Route::get('user/{name}', function($name){
	return redirect(route('posts.index'));
});

Route::get('tag/{name}', function($name){
	return redirect(route('posts.index'));
});

Route::get('/register', function () {
	return redirect('login');
});


/*
|--------------------------------------------------------------------------
| Test routes (for testing and debugging)
|--------------------------------------------------------------------------
|
| There is a Test route that generates fake posts (using the factory create() method)
| and two mail routes which sends a default email and returns the view of the email template
|
 
Route::group(['prefix' => 'test'], function () {

	Route::get('factory/', function(){
		$posts = factory(App\Models\Post::class, 100)->create();
		return redirect(route('posts.index'));
	});

	Route::get('/mail/view', function(){
		$logo = [
		'path' => '/img/logo.png',
		'width' => '320',
		'height' => '70'
		];
		return view('emails.welcome')->withLogo($logo)->with('confirmation_code', '000');

	});


});

*/

/*
|--------------------------------------------------------------------------
| API routes (all routes returns data in json format)
|--------------------------------------------------------------------------
|
| Route /posts : returns back all the posts
| Route /post/{id} : returns back the posts that is requested giving its id
| Route /user/{name}: returns back all the posts that are written from this author
| Route /tag/{name}: returns back all the posts that have this tag
| 
 */

Route::group(['prefix' => 'api'], function(){
	
	Route::group(['prefix' => 'withPagination'], function () {
		Route::get('posts', 'ApiController@postsWithPagination');
		Route::get('user/{name}', 'ApiController@postsFromSpesificUserWithPagination');
		Route::get('tag/{name}', 'ApiController@postsWithSpesificTagWithPagination');
	});

	Route::group(['prefix' => 'v1'], function () {
		Route::get('posts', 'ApiController@posts');
		Route::get('post/{id}', 'ApiController@postWithSpesificId');
		Route::get('popular/{count}', 'ApiController@popularPosts');
		Route::get('user/{name}', 'ApiController@postsFromUser');
		Route::get('tag/{name}', 'ApiController@postsWithTag');
	});
});