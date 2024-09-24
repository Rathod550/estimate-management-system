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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('service_id')->nullable();
            $table->longText('service_content')->nullable();
            $table->string('gst_type')->nullable();
            $table->string('gst')->nullable();
            $table->string('sgst')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('admin_approvel')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
