<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('categories',function($table){
			
			$table->increments('id');
			$table->string('category_name',128);
			$table->unsignedInteger('factory_id');
			$table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedInteger('parent_category')->nullable();
			$table->foreign('parent_category')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
