<?php
/**
 * Created by PhpStorm.
 * User: FallenBG
 * Date: 15-Jul-19
 * Time: 11:26 PM
 */

namespace Tests\Setup;


use App\Note;
use App\Project;
use App\Task;
use App\User;

class ProjectFactory
{

    protected $tasksCount = 0;

    protected $user;

    protected $note = false;

    public function withTasks($count)
    {
        $this->tasksCount = $count;

        // So we can use fluent API calls like:
        // $project = app(ProjectFactory::class)->withTasks(1)->create();
        return $this;
    }

    public function withNote()
    {
        $this->note = true;

        // So we can use fluent API calls like:
        // $project = app(ProjectFactory::class)->withTasks(1)->create();
        return $this;
    }

    public function create()
    {
        $project = factory(Project::class)->create([
            // If we have signed user - use it. Otherwise create new.
            'owner_id' => $this->user ?? factory(User::class)
        ]);

        // If we don't set taskCount this won't do anything.
        factory(Task::class, $this->tasksCount)->create([
            'project_id' => $project->id
        ]);

        // If we don't set taskCount this won't do anything.
        factory(Note::class, $this->note)->create([
            'project_id' => $project->id
        ]);

        return $project;
    }


    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }
}