<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topmenu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->int('parent_id');
			$table->int('lft');
			$table->int('rgt');
			$table->string('title');
			$table->string('link');
			$table->boolean('published');
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
		Schema::drop('topmenu');
	}

}
