<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePlayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('nik', 30);
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('handed', 15);
            $table->string('bet_wood', 30);
            $table->string('fh_rubber', 30);
            $table->string('bh_rubber', 30);
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
        Schema::dropIfExists('players');
    }
}
