<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Message as Message;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class EmailController extends Controller
{

	public function send(Request $request){

		$name = $request->input('name');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	$content = $request->input('message'); 

    	$message = new Message;
    	$message->name = $name;
    	$message->email = $email;
    	$message->phone = $phone;
    	$message->message = $content;
    	$message->save();

    	Flash::success('Your message has been sent to the admin');
        return redirect('contact');
    }
 

}

