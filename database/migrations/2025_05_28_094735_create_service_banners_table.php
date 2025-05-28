<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('service_banners', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->string('heading')->nullable();
        $table->text('paragraph')->nullable();
        $table->string('sub_heading')->nullable();
        $table->string('slug')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('service_banners');
    }
};
