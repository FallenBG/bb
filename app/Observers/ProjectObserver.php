<?php

namespace App\Observers;

use App\Activity;
use App\Project;

class ProjectObserver
{


    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $project->recordActivity('created');

    }//end created()


    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        $project->recordActivity('updated');

    }//end updated()

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function updating(Project $project)
    {
//        $project->old = $project->getOriginal();

    }//end updated()


    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function deleted(Project $project)
    {

    }//end deleted()


    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function restored(Project $project)
    {

    }//end restored()


    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {

    }//end forceDeleted()


}//end class
