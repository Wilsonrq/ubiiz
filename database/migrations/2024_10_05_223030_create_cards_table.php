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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("Img");
            $table->string("Titulo");
            $table->string("Descripcion");
            $table->string('whatsapp')->nullable(); // Nuevo campo para WhatsApp
            $table->string('facebook')->nullable(); // Nuevo campo para facebook
            $table->string('twitter')->nullable(); // Nuevo campo para twitter
            $table->string('instagram')->nullable(); // Nuevo campo para instagram
            $table->string('linkedin')->nullable(); // Nuevo campo para linkedin
            $table->string('web')->nullable(); // Nuevo campo para linkedin
            $table->string('qr_code')->nullable(); // Campo para almacenar la URL del código QR
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
