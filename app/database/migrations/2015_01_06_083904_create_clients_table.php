<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients',function($table){
			
			$table->increments('id');
			$table->unsignedInteger('factory_id');
			$table->string('client_name',128);
			$table->string('client_email',255)->nullable();
			$table->string('client_city')->nullable();
			$table->string('client_phone')->nullable();
			$table->integer('client_balance')->default(0);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('clients');
	}

}
