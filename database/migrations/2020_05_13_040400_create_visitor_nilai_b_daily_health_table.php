<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorNilaiBDailyHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_nilai_b_daily_health', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('name')->nullable();
            $table->string('NRIC_passport')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('nationality')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('symptoms_other')->nullable();
            $table->string('contact_with')->nullable();
            $table->string('is_visited_china')->nullable();
            $table->string('visited_country')->nullable();
            $table->string('visited_other_country')->nullable();
            $table->string('tabliqh')->nullable();
            $table->string('temperature')->nullable();
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
        Schema::dropIfExists('visitor_nilai_b_daily_health');
    }
}

