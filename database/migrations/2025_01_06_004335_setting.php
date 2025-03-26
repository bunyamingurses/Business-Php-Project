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
        Schema::create("setting",function (Blueprint $table){
            $table->id();
            $table->string("icon")->nullable(true);
            $table->string("logoHeader")->nullable(true);
            $table->string("logoHeaderAvif")->nullable(true);
            $table->string("logoFooter")->nullable(true);
            $table->string("logoFooterAvif")->nullable(true);
            $table->string("siteUrl")->nullable(true);
            $table->string("title")->nullable(true);
            $table->string("description")->nullable(true);
            $table->string("keyword")->nullable(true);
            $table->string("author")->nullable(true);
            $table->string("phoneNumber")->nullable(true);
            $table->string("email")->nullable(true);
            $table->string("address")->nullable(true);
            $table->string("workingHours")->nullable(true);
            $table->string("facebook")->nullable(true);
            $table->string("twitter")->nullable(true);
            $table->string("instagram")->nullable(true);
            $table->string("linkedin")->nullable(true);
            $table->dateTime("created_at")->nullable(true);
            $table->dateTime("updated_at")->nullable(true);
            $table->collation("utf8mb4_general_ci");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("setting");
    }
};
