<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpagesTable extends Migration
{
    public function up()
    {
        Schema::create('tblpages', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		$table->string('PageName')->nullable();
		$table->string('type');
		$table->longText('detail');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblpages');
    }
}