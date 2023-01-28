<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('periode_id')->constrained();
            $table->string('start');
            $table->string('end');
            $table->date('jour');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('matiere_id')->constrained();
            $table->foreignId('classe_id')->constrained();

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appels');
    }
};
