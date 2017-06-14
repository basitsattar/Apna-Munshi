<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items',function($table){
			$table->increments('id');
			$table->unsignedInteger('bill_id');
			$table->unsignedInteger('client_id')->nullable();
			$table->string('client_name');
			$table->unsignedInteger('product_id');
			$table->integer('quantity')->default(0);
			$table->integer('price')->default(0);
			$table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('items');
	}

}
