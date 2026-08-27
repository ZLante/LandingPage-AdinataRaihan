<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Contacts
        |--------------------------------------------------------------------------
        */

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 50)->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status', 50)->default('unread');
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Profiles
        |--------------------------------------------------------------------------
        */

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Departments / Jurusan
        |--------------------------------------------------------------------------
        */

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Achievements / Prestasi
        |--------------------------------------------------------------------------
        */

        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('achievement_date')->nullable();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Partners / Kerjasama
        |--------------------------------------------------------------------------
        */

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | News / Informasi
        |--------------------------------------------------------------------------
        */

        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status', 50)->default('published');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('contacts');
    }
};