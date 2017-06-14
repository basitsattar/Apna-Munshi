<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFactory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	    Schema::table('factories', function($table)
	    {
	        $table->string('parent_category_name', 100)->default("Category");
	        $table->string('child_category_name', 100)->default("Sub Category");
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factories', function($table)
		{
		    $table->dropColumn(array('parent_category_name', 'child_category_name'));
		});
	}

}
