<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Setting;
use Auth;
use Flash;

class AppController extends Controller
{

    /**
     *  In the constructor we attach the
     *  auth middleweare to the settings function 
     */
    public function __construct() {
        $this->middleware('auth' ,['only' => ['settings', 'save_settings', 'delete_account'] ]);
        $this->middleware('confirmation', ['only' => 'resend_code']);
    }

    /*
	*
	* Returns the about view
	*/
    public function about(){
    	return view('pages.about')->withPage('about');
    }

    /*
	*
	* Returns the contact view
	*/
    public function contact(){
    	return view('pages.contact')->withPage('contact');
    }

 	/*
	*
	* Returns the pin view
	*/
    public function pin($id){
    	return view('auth.pin')->with('id', $id)->withPage('pin');
    }

    /*
    *
    * Returns the terms view
    */
    public function terms(){
        
        return view('pages.terms')->withPage('terms');
    }

    /*
    *
    * Returns the settings view
    */
    public function settings(){
        $user = Auth::user();
        $settings = Setting::findOrFail($user->setting_id);

        $data = [
        'name' => $user->name,
        'email' => $user->email,
        'confirmed' => $user->confirmed
        ];


        return view('pages.settings')->withPage('settings')->withData($data)->withSettings($settings);
    }

    /*
    *
    * Saves the settings into the database
    */
    public function save_settings(Request $request){
        
        $user = Auth::user();
        $settings = Setting::findOrFail($user->setting_id);

        $user->name = $request->name;
        $user->save();

        $settings->certified = $request->certified ? 1 : 0;
        $settings->tags = $request->tags ? 1 : 0;
        $settings->show_first = $request->show_first;
        $settings->pagination_count = $request->pagination_count;
        $settings->pagination_type = $request->pagination_type;
        $settings->date_format = $request->date_format;

        $settings->save();

        Flash::success('Settings saved successfully!');
        return redirect('/settings');
    }

    /*
    *
    * Deletes the user
    */
    public function delete_account(){
        $user = Auth::user();

        $user->delete();

        Flash::warning('Your account has been deleted! From now on you can write non-certified posts.');
        return redirect(route('posts.index'));
    }


    /*
    *
    * Resends the confirmation code
    */
    public function resend_code(){

        $user = Auth::user();

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'confirmation_code' => $user->confirmation_code
        ];
        
        $logo = [
                'path' => asset('img/logo.png'),
                'width' => '320',
                'height' => '70',
            ];

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.welcome', ['confirmation_code' => $data['confirmation_code'], 'logo' => $logo], function ($message) use ($data) {
            $message
                ->from('no-reply@mrklog.com')
                ->to($data['email'], $data['name'])
                ->subject('Welcome!');
        });

        Flash::success('Please checkout your email inbox messages!');
        return redirect(route('posts.index'));
    }

}
