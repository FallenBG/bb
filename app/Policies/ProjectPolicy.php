<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Project $project)
    {
        // dd([$user,$project] );
        return $user->is($project->owner) || $project->members->contains($user);

    }//end update()

    public function manage(User $user, Project $project)
    {
        // dd([$user,$project] );
        return $user->is($project->owner);

    }//end update()


}//end class
