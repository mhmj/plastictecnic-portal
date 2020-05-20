<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorDailyHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_daily_health', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('daily_starter_pack')->nullable();
            $table->string('hand_sanitizing')->nullable();
            $table->string('flu')->nullable();
            $table->string('cough')->nullable();
            $table->string('breathing_difficulty')->nullable();
            $table->string('sore_throat')->nullable();
            $table->string('weak_in_limbs')->nullable();
            $table->string('overall_health')->nullable();
            $table->string('temperature')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('visitor_bangi_daily_health');
    }
}
