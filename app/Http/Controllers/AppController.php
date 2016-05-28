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
    * Returns the settings view
    */
    public function settings(){
        $user = Auth::user();
        $settings = Setting::findOrFail($user->setting_id);

        $data = [
        'name' => $user->name,
        'email' => $user->email
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
    * Returns the terms view
    */
    public function term(){
        
        return redirect(route('pages.terms'));
    }
}
