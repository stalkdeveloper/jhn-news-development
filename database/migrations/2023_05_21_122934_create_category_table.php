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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained('users');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->enum('is_active',['0','1'])->default('0')->comment('0 for Inactive and 1 for Active');
            $table->enum('is_delete',['0','1'])->default('0')->comment('0 for not deleted and 1 for Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
