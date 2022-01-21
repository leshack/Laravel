<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcontactusinfoTable extends Migration
{
    public function up()
    {
        Schema::create('tblcontactusinfo', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		;
		$table->string('EmailId')->nullable();
		$table->char('ContactNo')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblcontactusinfo');
    }
}