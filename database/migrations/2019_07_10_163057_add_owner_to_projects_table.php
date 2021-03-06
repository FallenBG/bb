<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerToProjectsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'projects',
            function (Blueprint $table) {
                                $table->unsignedBigInteger('owner_id')->after('description')->foreign('owner_id')->references('id')->on('user')->onDelete('cascade');
                $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            }
        );

    }//end up()


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'projects',
            function (Blueprint $table) {
                                $table->dropColumn('owner_id');
            }
        );

    }//end down()


}//end class
