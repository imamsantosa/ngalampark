<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('tiket', function(Blueprint $table){
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('limit');
            $table->integer('author_id')->unsigned();
            $table->double('harga');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('admin')->onDelete('cascade');
        });

        Schema::create('event', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->string('date');
            $table->string('image');
            $table->integer('author_id')->unsigned();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('admin')->onDelete('cascade');
        });

        Schema::create('pemesanan', function(Blueprint $table){
            $table->increments('id');
            $table->string('booking_code')->unique();
            $table->string('payment_code')->unique();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_pay');
            $table->date('payment_date')->nullable();
            $table->timestamps();

        });

        Schema::create('data_tiket', function(Blueprint $table){
            $table->increments('id');
            $table->string('booking_code');
            $table->string('id_number');
            $table->string('name');
            $table->boolean('is_print');
            $table->integer('date')->unsigned();
            $table->timestamps();

            $table->foreign('date')->references('id')->on('tiket')->onDelete('cascade');
            $table->foreign('booking_code')->references('booking_code')->on('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('config_tiket');
        Schema::dropIfExists('event');
        Schema::dropIfExists('pemesanan');
        Schema::dropIfExists('data_tiket');
    }
}
