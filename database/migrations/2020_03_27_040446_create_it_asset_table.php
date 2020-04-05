<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('it_asset', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('asset_category_id')->index()->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('it_asset_brand_id')->nullable();
            $table->string('it_asset_no')->nullable();
            $table->string('model')->nullable();
            $table->string('OS')->nullable();
            $table->string('computer_name')->nullable();
            $table->string('username')->nullable();
            $table->string('office')->nullable();
            $table->string('remark')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('service_tag')->nullable();
            $table->string('year_purchased')->nullable();
            $table->string('warranty_status')->nullable();
            $table->string('warranty_period')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('asset_category_id')->references('id')->on('asset_category')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('it_asset_brand_id')->references('id')->on('it_asset_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('it_asset');
    }
}
