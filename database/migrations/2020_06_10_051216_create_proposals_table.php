<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('request_service_id');
            $table->unsignedBigInteger('provider_service_id');
            $table->foreign('provider_service_id')->references('id')->on('service_providers')->onDelete('cascade');
            $table->foreign('request_service_id')->references('id')->on('request_services')->onDelete('cascade');
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
        Schema::dropIfExists('proposals');
    }
}
