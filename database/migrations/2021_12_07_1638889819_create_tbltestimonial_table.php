<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbltestimonialTable extends Migration
{
    public function up()
    {
        Schema::create('tbltestimonial', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('UserEmail');
            $table->mediumText('Testimonial');
            $table->timestamp('PostingDate')->useCurrent();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('user_id')->index('user_id')->foreign()->references('id')->on('users');
        

        });
    }

    public function down()
    {
        Schema::dropIfExists('tbltestimonial');
    }
}