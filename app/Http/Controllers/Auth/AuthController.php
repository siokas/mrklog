<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Setting;
use Auth;
use Flash;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Socialite;
use Validator;

class AuthController extends Controller {
	/*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
	}

	/**
	 * Redirect the user to the Social Platform authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider($provider) {
		return Socialite::driver($provider)->redirect();
	}

	/**
	 * Obtain the user information from Social Platform.
	 *
	 * @return Response
	 */
	public function handleProviderCallback($provider) {

		$provider_user = Socialite::driver($provider)->user();
		$token = $provider_user->token;

		$user = User::where('email', $provider_user->getEmail())->first();
		if (!isset($user)) {
			return view('auth.register_from_provider')->with('user', $provider_user)->with('token', $token);
		} else {
			Auth::loginUsingId($user['id']);
			return redirect('/');
		}

	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data) {

		$confirmation_code = str_random(30);
		try{
			$this->sendConfirmationEmail($data, $confirmation_code);
		}catch(Exception $e){
			// just continue... for now
		}finally{
			$setting = new Setting;
			$setting->save();
			

			return User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'setting_id' => $setting->id,
				'confirmation_code' => $confirmation_code,
			]);
		}
	}

	protected function sendConfirmationEmail(array $data, $confirmation_code){

		$logo = [
			'path' => asset('img/logo.png'),
			'width' => '320',
			'height' => '70',
		];

		$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
		$beautymail->send('emails.welcome', ['confirmation_code' => $confirmation_code, 'logo' => $logo], function ($message) use ($data) {
			$message
				->from('no-reply@mrklog.com')
				->to($data['email'], $data['name'])
				->subject('Welcome!');
		});

		Flash::success('Hi ' . $data['name'] . '. In order to be a cerified user you have to confirm your email!');
	}
}
