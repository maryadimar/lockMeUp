<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViconPribadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicon_pribadis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->uuid('uuid');
            $table->string('nohp',20);
            $table->text('agenda');
            $table->string('bagian',50);
            $table->string('r_meeting',90);
            $table->string('tanggal',90);
            $table->string('mulai',10)->nullable();
            $table->string('selesai',10)->nullable();
            $table->string('email', 90)->nullable();
            $table->string('meeting_id', 90)->nullable();
            $table->string('meeting_idl', 90)->nullable();
            $table->text('peserta_cabang')->nullable();
            $table->text('peserta_orang')->nullable();
            $table->string('pic', 90)->nullable();
            $table->string('pics', 90)->nullable();
            $table->string('no_surat',100)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('vicon_pribadis');
    }
}
