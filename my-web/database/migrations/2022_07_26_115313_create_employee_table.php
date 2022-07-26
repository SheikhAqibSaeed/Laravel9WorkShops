<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//  Using Command Line
// php artisan make:migration create_employee_table
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->char('Phone');
            $table->string('Adress');
            // if you missing the Colunm and then Add Column Into Existing Migration
            //  Using Command Line
            $table->string('Email');    // php artisan migrate:fresh/refresh and then Include the colunm
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
        Schema::dropIfExists('employee');
    }
};
