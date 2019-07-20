<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'notes',
            function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->unsignedBigInteger('project_id');
                $table->text('body');
                $table->timestamps();

                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('notes');

    }//end down()


}//end class
