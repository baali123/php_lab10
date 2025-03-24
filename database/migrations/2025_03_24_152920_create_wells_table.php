<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wells', function (Blueprint $table) {
            $table->id();
            $table->string('well_name')->unique();
            $table->string('field_location');
            $table->integer('depth_meters');
            $table->enum('status', ['Drilling', 'Producing', 'Suspended', 'Decommissioned']);
            $table->decimal('production_bpd', 10, 2)->nullable();
            $table->date('commissioned_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wells');
    }
};