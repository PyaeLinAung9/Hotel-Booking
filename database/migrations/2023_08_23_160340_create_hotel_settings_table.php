<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('occupancy',50);
            $table->string('email',50);
            $table->string('online_number',50);
            $table->string('outline_number',50);
            $table->string('check_in',20);
            $table->string('check_out',20);
            $table->string('price_unit',20);
            $table->string('size_unit',20);
            $table->text('address');
            $table->string('image',30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_settings');
    }
};
