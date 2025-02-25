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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nisn',20);
            $table->string('nama',30);
            $table->text('alamat');
            $table->string('telp',15);
            $table->enum('jk',['L','P']);
            $table->string('username',30);
            $table->string('password',100);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('lokal_id')->constrained('lokals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
