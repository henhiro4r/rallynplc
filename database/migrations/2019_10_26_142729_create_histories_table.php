<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('game_id');
            $table->bigInteger('teamA');
            $table->enum('resultA', ['W', 'L', 'D'])->default('W')->comment('Win, Lose, Draw')->nullable();
            $table->bigInteger('teamB');
            $table->enum('resultB', ['W', 'L', 'D'])->default('W')->comment('Win, Lose, Draw')->nullable();
            $table->enum('is_done', ['0','1'])->default('0')->comment('0 = no, 1 = yes');
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
        Schema::dropIfExists('histories');
    }
}
