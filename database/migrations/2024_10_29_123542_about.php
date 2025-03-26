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
        Schema::create("about",function (Blueprint $table){
            $table->id();
            $table->text("about")->nullable(false);
            $table->text("aboutEnglish")->nullable(false);
            $table->text("aboutImage")->nullable(false);
            $table->text("aboutImageAvif")->nullable(false);
            $table->text("bannerImage")->nullable(false);
            $table->text("bannerImageAvif")->nullable(false);
            $table->text("mission")->nullable(false);
            $table->text("missionEnglish")->nullable(false);
            $table->text("vision")->nullable(false);
            $table->text("visionEnglish")->nullable(false);
            $table->text("kvkk")->nullable(false);
            $table->text("kvkkEnglish")->nullable(false);
            $table->text("qualityPolicy")->nullable(false);
            $table->text("qualityPolicyEnglish")->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("about");
    }
};
