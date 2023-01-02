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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->on('vehicles')->onDelete('cascade');;
            $table->string('description');
            $table->date('registration_date')->default(\Carbon\Carbon::now()->toDateString());
            $table->date('analysis_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('final_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
};
