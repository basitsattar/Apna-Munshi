<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bills', function($table)
	    {
	    	$table->unsignedInteger('client_id')->nullable();
	       	$table->string('client_name');
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
	       	
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bills', function($table)
	    {
	        $table->dropColumn('client_id');
	        $table->dropColumn('client_name');
	    });
	}


}
