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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->binary('img')->nullable();
            $table->bigInteger('phone_num')->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    App\Models\User::create([
        'name' => 'vong',
        'email' => 'vong@gmail.com',
        'password' => bcrypt('123456'),
        'phone_num' => '0123456789',
        'description' => 'I am a developer',
    ]);

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
