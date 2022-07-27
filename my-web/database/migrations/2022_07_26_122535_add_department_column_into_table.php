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
    public function up()    // up method creating the whatever  
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->string('Department')->after('Email');   // after means helps the how to set up and dwon
        });
       // Schema::rename('employees', 'employee');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()     //  down method for drop the permanent
    {
        Schema::table('employee', function (Blueprint $table) {
           $table->dropColumn('Department');
        });

        
    }
};
