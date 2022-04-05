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
		$table->string('email')->nullable();
		$table->integer('vehicle_id')->nullable();
        $table->unsignedBigInteger('user_id')->nullable()->index('user_id')->foreign()->references('id')->on('users');
		$table->string('FromDate')->nullable();
		$table->string('ToDate')->nullable();
		$table->string('messages')->nullable();
		$table->integer('status')->nullable();
        $table->timestamp('created_at')->nullable()->useCurrent();
        $table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblbookings');
    }
}
