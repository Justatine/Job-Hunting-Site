<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->enum('role',['Company','Admin','Applicant']);
            $table->enum('status',['Pending','Active']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        
        User::insert([
            [
                'name'=>'Justine Taga-an',
                'email'=>'tagaanjustinemark3@gmail.com',
                'password'=>Hash::make('qwe'),
                'role'=>'Admin',
                'status'=>'Active',
            ],
            [
                'name'=>'Mark Taga-an',
                'email'=>'tagaanjustinemark2@gmail.com',
                'password'=>Hash::make('qwe'),
                'role'=>'Company',
                'status'=>'Active',
            ],
            [
                'name'=>'Ramos Taga-an',
                'email'=>'tagaanjustinemark1@gmail.com',
                'password'=>Hash::make('qwe'),
                'role'=>'Applicant',
                'status'=>'Pending',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
