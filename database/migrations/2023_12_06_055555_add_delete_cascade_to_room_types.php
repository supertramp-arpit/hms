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
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']); // Drop existing foreign key
            $table->foreign('hotel_id')
                  ->references('id')
                  ->on('hotels')
                  ->onDelete('cascade'); // Add the DELETE CASCADE constraint
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            // Add foreign key without cascade in case of rollback
            $table->foreign('hotel_id')
                  ->references('id')
                  ->on('hotels');
        });
    }
};
