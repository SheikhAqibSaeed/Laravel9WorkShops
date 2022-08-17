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
        //  Difference b/w Table & Create
        // Table tb create krty hy jb ham ny koi column add krna ho & Create tab use hota jab hum table create krna chahty h
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('gallery_id')->after('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('gallery_id');
        });
    }
};
