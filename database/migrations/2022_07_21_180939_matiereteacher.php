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
        Schema::create('matiere_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('matiere_id')->nullable()->constrained();

            $table->timestamps();

         //   $table->foreign('nomteacher')->references('nomteacher')->on('teacher');
           // $table->foreign('nommatiere')->references('nommatiere')->on('matiere');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists('matiere_user');

    }
};
