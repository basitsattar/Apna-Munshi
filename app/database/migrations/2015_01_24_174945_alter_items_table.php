<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::table('items', function($table)
//	    {
//	       	$table->unsignedInteger('factory_id');
//			$table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
//	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::table('items', function($table)
//	    {
//	        $table->dropColumn('factory_id');
//	    });
	}

}
