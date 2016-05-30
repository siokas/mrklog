<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppLinksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
        	 ->seePageIs('posts')
    		 ->click('About')
        	 ->seePageIs('about')
        	 ->click('Contact')
        	 ->seePageIs('/contact')
        	 ->click('About')
        	 ->seePageIs('about')
        	 ->click('Contact')
        	 ->seePageIs('contact')
        	 ->click('Create New Post')
        	 ->seePageIs('posts/create');	 
    }

}
