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
        Schema::create('feature_banners', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->string('image')->nullable();
            $table->string('detail_heading')->nullable();
            $table->text('detail_paragraph')->nullable();
            $table->string('slug')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_banners');
    }
};
