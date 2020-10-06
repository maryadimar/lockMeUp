<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->uuid('uuid');
            $table->string('pn',10);
            $table->string('nohp',20);
            $table->text('agenda');
            $table->string('bagian',50);
            $table->string('r_meeting',90);
            $table->string('tanggal',90);
            $table->string('mulai',90);
            $table->string('selesai', 90);
            $table->text('peserta');
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
        Schema::dropIfExists('meets');
    }
}
