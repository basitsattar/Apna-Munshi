<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('products',function($table){
			
			$table->increments('id');
			$table->string('product_name',128);
			$table->unsignedInteger('factory_id');
			$table->unsignedInteger('category_id')->nullable();
			$table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
