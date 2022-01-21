<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblbookingsTable extends Migration
{
    public function up()
    {
        Schema::create('tblbookings', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		$table->string('userEmail')->nullable();
		$table->integer('vehicle_id')->nullable();
		$table->string('FromDate')->nullable();
		$table->string('ToDate')->nullable();
		$table->string('message')->nullable();
		$table->integer('Status')->nullable();
		$table->timestamp('PostingDate')->useCurrent();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblbookings');
    }
}