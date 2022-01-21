<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcontactusqueryTable extends Migration
{
    public function up()
    {
        Schema::create('tblcontactusquery', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		$table->string('name')->nullable();
		$table->string('EmailId')->nullable();
		$table->char('ContactNumber')->nullable();
		;
		$table->timestamp('PostingDate')->useCurrent();
		$table->integer('status')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblcontactusquery');
    }
}