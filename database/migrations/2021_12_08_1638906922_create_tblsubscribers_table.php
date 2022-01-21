<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblsubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('tblsubscribers', function (Blueprint $table) {

		$table->integer('id')->autoIncrement();
		$table->string('SubscriberEmail')->nullable();
		$table->timestamp('PostingDate')->nullable()->useCurrent();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblsubscribers');
    }
}