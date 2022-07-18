<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('full_name');
            $table->boolean('gender');
            $table->string('phone_num')->unique();
            $table->string('address')->nullable();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('licence_plate')->unique();
            $table->boolean('is_active');
            $table->foreignId('client_id')->constrained('clients', 'client_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
        Schema::drop('clients');
    }
};
