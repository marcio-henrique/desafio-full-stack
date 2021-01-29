<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('phone_number');
            $table->string('email')->index();
            $table->string('photo_url')->nullable();
            $table->unsignedBigInteger('official_document_id');
            $table->timestamps();

            $table->foreign('official_document_id')->references('id')->on('official_documents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
