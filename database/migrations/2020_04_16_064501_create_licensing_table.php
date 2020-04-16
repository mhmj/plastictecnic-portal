<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('it_asset_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('license_name')->nullable();
            $table->string('license_no')->nullable();
            $table->string('vendor')->nullable();
            $table->string('serial_key')->nullable();
            $table->string('version')->nullable();
            $table->string('quantity')->nullable();
            $table->string('remark')->nullable();
            $table->string('date_purchased')->nullable();
            $table->string('date_expired')->nullable();
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
        Schema::dropIfExists('licensing');
    }
}
