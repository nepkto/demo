<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProviderProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->unsignedBigInteger('service_provider_id');

            $table->foreign('service_provider_id')
                  ->references('id')
                  ->on('service_providers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_provider_profiles');
    }
}
