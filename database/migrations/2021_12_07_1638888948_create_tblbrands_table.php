<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblbrandsTable extends Migration
{
    public function up()
    {
        Schema::create('tblbrands', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
        $table->unsignedBigInteger('vehicle_id')->nullable()->index('vehicle_id')->foreign()->references('id')->on('tblvehicles');
		$table->string('BrandName');
        $table->unsignedBigInteger('bookings_id')->nullable()->index('bookings_id')->foreign()->references('id')->on('tblbookings');
		$table->timestamp('created_at')->nullable()->useCurrent();
		$table->timestamp('updated_at')->nullable();


        });
    }

    public function down()
    {
        Schema::dropIfExists('tblbrands');
    }
}
