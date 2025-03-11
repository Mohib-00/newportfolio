<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}

