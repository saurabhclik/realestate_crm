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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');

                $table->text('name');

                $table->string('mobile', 255)->nullable();

                $table->string('email', 255);
                $table->index('email');

                $table->text('password');

                $table->string('role', 255);

                $table->tinyInteger('is_special')->default(0);

                $table->longText('master_options')->nullable();

                $table->integer('tm_id')->default(0);

                $table->integer('is_active')->default(1);

                $table->text('token')->nullable();

                $table->dateTime('last_login')->nullable();

                $table->integer('designation_id')->nullable();

                $table->text('current_location')->nullable();

                $table->text('password_reset_token')->nullable();

                $table->text('fcm_token')->nullable();

                $table->dateTime('created_date')->useCurrent();

                $table->dateTime('updated_date')->nullable()->useCurrentOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};