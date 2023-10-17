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
        Schema::create('kwalificatiedosierfiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kwalificatiedosier_id');
            $table->string('descriptie');
            $table->binary('file');
            $table->string('filetype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kwalificatiedosierfiles');
    }
};
