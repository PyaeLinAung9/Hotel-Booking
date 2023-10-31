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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->integer('occupation');
            $table->integer('bed');
            $table->integer('view');
            $table->integer('size');
            $table->integer('price_per_day');
            $table->integer('extra_bed_price');
            $table->longText('description');
            $table->longText('detail');
            $table->string('thumbnail_image',100);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
