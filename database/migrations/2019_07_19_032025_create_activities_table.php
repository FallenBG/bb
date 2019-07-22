<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'activities',
            function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->unsignedBigInteger('project_id');
//                $table->morphs('subject');
                $table->nullableMorphs('subject');
//                This is identical to morphs()
//                $table->unsignedBigInteger('subject_id');
//                $table->string('subject_type');
                $table->string('description', 255)->nullable();
                $table->text('changes')->nullable();
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
        Schema::dropIfExists('activities');

    }//end down()


}//end class
