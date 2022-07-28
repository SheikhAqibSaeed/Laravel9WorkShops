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
        // Schema::create('posts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('Name');
        //     $table->char('Phone');
        //     $table->string('Adress');
        //     $table->string('Email');
        //     $table->timestamps();
        // });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->char('description');
            $table->boolean('is_publish');
            $table->boolean('is_active');
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
        Schema::dropIfExists('posts');
    }
};
