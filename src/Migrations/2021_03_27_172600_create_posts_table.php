<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{

    private $tablename = 'posts';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tablename, function(Blueprint $table)
		{
			$table->increments('id');
		    	$table->unsignedBigInteger('user_id');
		    	$table->string('title', 100);
		    	$table->string('slug', 100)->unique();
		    	$table->text('content');
		    	$table->integer('category_id')->unsigned();
		    	$table->timestamps();
		});

        Schema::table($this->tablename, function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('posts_categories')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->tablename);
	}
}
