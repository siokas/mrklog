<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->registerUser();
        	 $this->click('Logout');
        	 $this->loginUser();
        	 $this->confirmUser();
        	 $this->deleteUser();
    }

    private function registerUser(){
    	$this->visit('login')
    	 	  ->click('Sign Up')
    	 	  ->type('John Doe', 'name')
    	 	  ->type('test@email.com', 'email')
    	 	  ->type('123456789', 'password')
    	 	  ->type('123456789', 'password_confirmation')
    	 	  ->press('Create Account')
    	 	  ->seePageIs('posts');
    }

    private function loginUser(){
    	$this->visit('login')
    	 	  ->type('test@email.com', 'email')
    	 	  ->type('123456789', 'password')
    	 	  ->press('Log In')
    	 	  ->seePageIs('posts');
    }

    private function confirmUser(){
    	$this->visit('register/verify/1234')
    		 ->seePageIs('posts')
    		 ->see('You have successfully verified your account.');
    }

    private function deleteUser(){
    	$this->visit('settings')
    		 ->press('Delete Account')
    		 ->see('Your account has been deleted! From now on you can write non-certified posts.');
    }
}
