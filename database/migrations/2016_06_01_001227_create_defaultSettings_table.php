<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaultSettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('certified')->default(0);
            $table->boolean('tags')->default(1);
            $table->string('show_first')->default('show-1');
            $table->integer('pagination_count')->default(5);
            $table->boolean('pagination_type')->default(0);
            $table->string('date_format')->default('LL');
            $table->string('pinToTop')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('defaultSettings');
    }
}
