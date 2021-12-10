<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('time', 5);
            $table->string('location', 100);
            $table->string('table', 20);
            $table->integer('player_a_1');
            $table->integer('player_a_2')->nullable();
            $table->integer('player_b_1');
            $table->integer('player_b_2')->nullable();
            $table->smallInteger('score_a_1')->nullable();
            $table->smallInteger('score_a_2')->nullable();
            $table->smallInteger('score_a_3')->nullable();
            $table->smallInteger('score_a_4')->nullable();
            $table->smallInteger('score_a_5')->nullable();
            $table->smallInteger('score_b_1')->nullable();
            $table->smallInteger('score_b_2')->nullable();
            $table->smallInteger('score_b_3')->nullable();
            $table->smallInteger('score_b_4')->nullable();
            $table->smallInteger('score_b_5')->nullable();
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
        //
    }
}
