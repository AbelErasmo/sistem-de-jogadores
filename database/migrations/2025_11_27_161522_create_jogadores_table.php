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
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id('id_jogador');
            $table->string('apelido', 45);
            $table->string('nome', 100);
            $table->date('data_nascimento')->index();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->unique()
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogadores');
    }
};