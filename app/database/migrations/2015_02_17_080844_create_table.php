<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
      	{
          $table->increments('id');

          $table->string('username', 32);
          $table->string('password', 64);

                      // required for Laravel 4.1.26
                      $table->string('remember_token', 100)->nullable();
          $table->timestamps();
      	});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cat_name',40);
			$table->text('description');
			$table->string('image');
			$table->timestamps();
		});
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_name',40);
			$table->text('description');
			$table->integer('cat_id');
			$table->string('image');
			$table->timestamps();
		});
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('img_name',40);
			$table->text('description');
			$table->integer('item_id');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::dropIfExsists('categories');
		Schema::dropIfExsists('items');
		Schema::dropIfExsists('images');
	}

}
