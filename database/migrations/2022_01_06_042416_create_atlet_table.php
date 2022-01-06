<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs');
            $table->string('nama', 100);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir', 200);
            $table->string('jenis_kelamin', 50);
            $table->string('agama', 50);
            $table->string('status', 50);
            $table->string('nik', 30);
            $table->string('alamat', 200);
            $table->string('kode_pos', 10)->nullable();
            $table->string('nama_sekolah', 200)->nullable();
            $table->decimal('tinggi', 8,2)->nullable();
            $table->decimal('berat',8,2)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('telepon_wali', 15)->nullable();
            $table->string('nama_kejuaraan', 200);
            $table->integer('tahun_kejuaraan')->nullable();
            $table->string('tingkat_kejuaraan', 50)->nullable();
            $table->string('tempat_kejuaraan', 100)->nullable();
            $table->string('sertifikat', 50)->nullable();
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
        Schema::dropIfExists('atlet');
    }
}
