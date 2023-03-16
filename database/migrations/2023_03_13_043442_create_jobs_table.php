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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            // when user is deleted, jobs created by the user are also deleted.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->longText('logo')->nullable();
            $table->string('tags');
            $table->string('company');
            $table->string('companyDescription')->nullable();
            $table->string('location');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('tasks');
            $table->text('requirements');
            $table->string('salary');
            $table->text('benefits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
