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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('is_active',['0','1'])->default('1')->comment('0 for Inactive and 1 for Active');
            $table->enum('is_verified',['0','1'])->default('0')->comment('0 for  unverified user and 1 for verified user');
            $table->enum('usertype',['admin','bc', 'reporter', 'editor', 'user'])->default('user')->comment('Usertype are based on user role!');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
