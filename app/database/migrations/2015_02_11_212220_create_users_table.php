<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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
		Schema::dropIfExsists('categories');
		Schema::dropIfExsists('items');
		Schema::dropIfExsists('images');
	}

}
