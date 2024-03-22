<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailService', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_id'); // Add foreign key column
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('overview')->nullable();
            $table->text('longDescr')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
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
        Schema::dropIfExists('detailService');
    }
}
