<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title');
			$table->string('article', 10000);
			$table->string('author');
			$table->boolean('certified')->default(0);
			$table->integer('user_id')->default(0);
			$table->string('pin');
			$table->string('tags');
			$table->bigInteger('views')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('posts');
	}
}
