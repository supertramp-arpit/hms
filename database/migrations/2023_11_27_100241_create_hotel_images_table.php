<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('hotel_images', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('hotel_id');
        $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        $table->string('image_path'); // Adjust the field according to your needs
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
        Schema::dropIfExists('hotel_images');
    }
};
