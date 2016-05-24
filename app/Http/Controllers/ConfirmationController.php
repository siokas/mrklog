<?php

namespace App\Http\Controllers;

use App\User as User;
use Flash;

class ConfirmationController extends Controller {

	public function confirm($confirmation_code) {
		if (!$confirmation_code) {
			return ('InvalidConfirmationCodeException');
		}

		$user = User::whereConfirmationCode($confirmation_code)->first();

		if (!$user) {
			return ('InvalidConfirmationCodeException');
		}

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		Flash::message('You have successfully verified your account.');

		return redirect(route('posts.index'));
	}
}
