<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MessageController extends Controller
{
	/*
	 * Save the meesage to database
	 *
	 */
    public function send(Request $request){

		$name = $request->input('name');
    	$email = $request->input('email');
    	$content = $request->input('message'); 

    	$message = new Message;
    	$message->name = $name;
    	$message->email = $email;
    	$message->message = $content;
    	$message->save();

    	Flash::success('Your message has been sent to the admin');
        return redirect('contact');
    }
}
