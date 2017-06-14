<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees',function($table){
			
			$table->increments('id');
			$table->unsignedInteger('factory_id');
			$table->string('employee_name',128);
			$table->string('employee_email',255)->nullable();
			$table->string('employee_phone',255)->nullable();
			$table->string('employee_designation')->nullable();
			$table->integer('employee_salary')->default(0);
			$table->integer('employee_remaining_amount')->default(0);
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
		Schema::drop('employees');
	}

}
