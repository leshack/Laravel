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
		$table->string('email')->nullable();
		$table->char('phone_number')->nullable();
        $table->text('subject')->nullable();
		$table->longText('message')->nullable();
		$table->timestamp('PostingDate')->useCurrent();
		$table->integer('status')->nullable();
		$table->timestamp('updated_at')->nullable();
        $table->timestamp('created_at')->nullable()->useCurrent();


        });
    }

    public function down()
    {
        Schema::dropIfExists('tblcontactusquery');
    }
}
