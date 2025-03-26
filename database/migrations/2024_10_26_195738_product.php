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
        Schema::create("product",function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("categoryId")->nullable(false);
            $table->string("images")->nullable(false);
            $table->string("imagesAvif")->nullable(false);
            $table->string("title")->nullable(false);
            $table->string("titleEnglish")->nullable(false);
            $table->text("text")->nullable(false);
            $table->text("textEnglish")->nullable(false);
            $table->string("isPopular")->default(0)->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);


            $table->foreign("categoryId")->on("category")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("product");
    }
};
