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
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id')->foreign()->references('id')->on('users');
            $table->string('email');
            $table->mediumText('Testimonial');
            $table->boolean('status')->detault('0');
            $table->timestamp('PostingDate')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();



        });
    }

    public function down()
    {
        Schema::dropIfExists('tbltestimonial');
    }
}
