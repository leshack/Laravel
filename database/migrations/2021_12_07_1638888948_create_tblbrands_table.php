<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblbrandsTable extends Migration
{
    public function up()
    {
        Schema::create('tblbrands', function (Blueprint $table) {

		$table->integer('id')->autoIncrement()->onDuplicateReplace();
        $table->unsignedBigInteger('vehicle_id')->nullable()->index('vehicle_id')->foreign()->references('id')->on('tblvehicles')->comment('The corresponding vehicle.');
		$table->string('BrandName');
        $table->unsignedBigInteger('bookings_id')->nullable()->index('bookings_id')->foreign()->references('id')->on('tblbookings')->comment('The corresponding booking id.');
		$table->timestamp('CreationDate')->nullable()->useCurrent();
		$table->timestamp('UpdationDate')->nullable();


        });
    }

    public function down()
    {
        Schema::dropIfExists('tblbrands');
    }
}