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
        Schema::create('matiere_teacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nomteacher');
            $table->string('nommatiere');
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
           Schema::dropIfExists('matiere_teacher');

    }
};
