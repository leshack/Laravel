<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {

		$table->integer('id');
		$table->string('UserName');
		$table->string('Password');
		$table->timestamp('updationDate')->useCurrent();

        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}