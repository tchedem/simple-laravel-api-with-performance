<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('assigned_to')->nullable();

            $table->uuid('user_id')->nullable( );
            $table->foreign('user_id')->references('id')->on('users');

            // $table->dateTime('started_at', precision: 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('started_at', precision: 0)->nullable();
            $table->dateTime('end_at', precision: 0)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
