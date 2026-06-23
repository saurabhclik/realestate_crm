<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_center_actions', function (Blueprint $table) {
            $table->id();
            $table->string('display_name'); 
            $table->string('system_name')->unique(); 
            $table->string('type')->default('checkbox'); // REMOVED ->after('system_name')
            $table->integer('seq')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('updated_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_center_actions');
    }
};