<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {

		$table->id;
		$table->string('Username');
		$table->string('password');
        $table->string('email')->unique();
        $table->string('picture')->nullable();
        $table->string('skills')->nullable();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
