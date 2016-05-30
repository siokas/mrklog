<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
		 $this->createPost();
		 $this->editPost();
    }

    private function createPost(){

    	$this->visit('posts/create')
        	 ->type('Test', 'article')
        	 ->type('testTag', 'tags')
        	 ->press('Save')
    		 ->see('Post saved successfully. Your pin code is: abcde. Please keep this code in order to update or delete your post.');
    }

    private function editPost(){

    	$postID = Post::where('title', 'Test')->where('article', 'Test')->orderBy('id', 'desc')->firstOrFail();

    	$this->visit('posts/' . $postID->id)
    		 ->click('Update Post')
    		 ->seePageIs('pin/' . $postID->id)
    		 ->type('abcde', 'pin')
    		 ->press('Submit')
    		 ->seePageIs('posts/' . $postID->id . '/edit')
    		 ->press('DELETE ARTICLE');

  	
    }

    private function deletePost(){
    	
    }
}
