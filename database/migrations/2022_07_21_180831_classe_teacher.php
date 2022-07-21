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
        Schema::create('classe_teacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idteacher');
            $table->integer('idclasse');
            $table->timestamps();

            $table->foreign('idteacher')->references('idteacher')->on('teacher');
            $table->foreign('idclasse')->references('idclasse')->on('classe');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists('classe_teacher');

    }
};
