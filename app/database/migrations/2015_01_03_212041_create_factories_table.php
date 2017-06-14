<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factories',function($table){
			
			$table->increments('id');
			$table->string('factory_name',128);
			$table->unsignedInteger('company_id');
			$table->foreign('company_id')->references('id')->on('company')->onUpdate('cascade')->onDelete('restrict');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factories');
	}

}
