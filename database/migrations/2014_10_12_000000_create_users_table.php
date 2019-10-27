<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->bigInteger('detail_id')->index()->nullable();
            $table->bigInteger('role_id')->index()->unsigned();
            $table->string('point_now')->nullable();
            $table->string('point_used')->nullable();
            $table->enum('is_login', ['0','1'])->default('0');
            $table->enum('status', ['D','E'])->default('E');
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_logout')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
