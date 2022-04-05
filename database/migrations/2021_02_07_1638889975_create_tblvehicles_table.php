<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblvehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('tblvehicles', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		$table->string('VehiclesTitle')->nullable();
		$table->integer('VehiclesBrand')->nullable();
        $table->integer('booking_id')->nullable();
		$table->text('VehiclesOverview');
		$table->integer('PricePerDay')->nullable();
		$table->string('FuelType')->nullable();
		$table->integer('ModelYear')->nullable();
		$table->integer('SeatingCapacity')->nullable();
		$table->string('Vimage1')->nullable();
		$table->string('Vimage2')->nullable();
		$table->string('Vimage3')->nullable();
		$table->string('Vimage4')->nullable();
		$table->string('Vimage5')->nullable();
		$table->integer('AirConditioner')->nullable();
		$table->integer('PowerDoorLocks')->nullable();
		$table->integer('AntiLockBrakingSystem')->nullable();
		$table->integer('BrakeAssist')->nullable();
		$table->integer('PowerSteering')->nullable();
		$table->integer('DriverAirbag')->nullable();
		$table->integer('PassengerAirbag')->nullable();
		$table->integer('PowerWindows')->nullable();
		$table->integer('CDPlayer')->nullable();
		$table->integer('CentralLocking')->nullable();
		$table->integer('CrashSensor')->nullable();
		$table->integer('LeatherSeats')->nullable();
		$table->timestamp('RegDate')->useCurrent();
		$table->timestamp('UpdationDate')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblvehicles');
    }
}
