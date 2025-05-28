<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->string('heading')->nullable();
        $table->string('paragraph')->nullable();
        $table->string('links')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
