<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bills', function($table)
	    {
	       	$table->unsignedInteger('factory_id');
	       	$table->date('date');
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
		Schema::table('bills', function($table)
	    {
	        $table->dropColumn('factory_id');
	        $table->dropColumn('date');
	        $table->dropColumn('created_at');
	    });
	}

}
