<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_usages', function (Blueprint $table) {
            $table->id();
            $table->integer('adno');
            $table->string('time');
            $table->string('system');
            $table->string('internet',124);
            $table->integer('netamount');
            $table->string('status',124);
            $table->string('registeredby',124);
            $table->string('admittedby',124);
            $table->string('leftedby',124);
            $table->string('registertime');
            $table->string('admittime');
            $table->string('lefttime');
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
        Schema::dropIfExists('lab_usages');
    }
}
