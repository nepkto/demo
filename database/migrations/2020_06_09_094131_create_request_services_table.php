<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_consumer_id');
            $table->bigInteger('service_id');
            $table->bigInteger('request_num');
            $table->string('address');
            $table->string('problem');
            $table->date('appointment_date');
            $table->longText('description');
            $table->double('latitude');
            $table->double('longitude');
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
        Schema::dropIfExists('request_services');
    }
}
