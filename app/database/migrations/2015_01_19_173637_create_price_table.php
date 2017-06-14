<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('price',function($table){
			$table->unsignedInteger('client_id');
			$table->unsignedInteger('product_id');
			$table->integer('price');
			$table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('price');
	}

}
