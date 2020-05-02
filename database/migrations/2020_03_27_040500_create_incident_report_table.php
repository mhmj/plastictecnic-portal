<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_no')->nullable();
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('handle_by')->nullable();
            $table->unsignedBigInteger('confirm_by')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('root_cause')->nullable();
            $table->string('incident_category')->nullable();
            $table->string('job_start')->nullable();
            $table->string('job_finish')->nullable();
            $table->string('description')->nullable();
            $table->longText('image')->nullable();
            $table->string('rate')->nullable();
            $table->string('status')->nullable();
            $table->string('solution')->nullable();
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
        Schema::dropIfExists('incident_report');
    }
}
