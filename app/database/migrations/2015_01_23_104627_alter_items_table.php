<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterItemsTableAgain extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items', function($table)
	    {
	    	$table->dropForeign('items_client_id_foreign');
	         $table->dropColumn(array('client_id', 'client_name'));
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			$table->unsignedInteger('client_id')->nullable();;
	       	$table->string('client_name');
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
	}

}
