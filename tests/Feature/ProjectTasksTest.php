<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        
        $this->post($project->path() . '/tasks', ['body' => 'Test Task', 'user_id' => auth()->id()]);
//dd('wwaat');
        $this->get($project->path())
            ->assertSee('Test Task');
    }

//    /** @test */
//    public function a_task_requires_a_title()
//    {
////        $this->withoutExceptionHandling();
//        $this->signIn();
//        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
//        $attributes = factory('App\Task')->raw(['title' => '']);
//        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('title');
//    }

    /** @test */
    public function a_task_requires_a_body()
    {
//        $this->withoutExceptionHandling();
        $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $attributes = factory('App\Task')->raw(['body' => '']);
        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();
        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks', ['body' => 'Test Task 123'])
            ->assertStatus(403);

        // Must nbot have record in the DB
        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task 123']);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_tasks()
    {
        $this->signIn();
        $project = factory('App\Project')->create();
        $task = $project->addTask([
            'body' => 'Test Task',
            'completed' => false,
            'user_id' => auth()->id()
        ]);

        $this->patch($task->path(), ['body' => 'Test Task 123'])
            ->assertStatus(403);

        // Must nbot have record in the DB
        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task 123']);
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->signIn();
//        $project = factory('App\Project')->create();

        // Create a project for the logged in user.
        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );

        // Add task to the project
        $task = $project->addTask([
            'body' => 'Test Task',
            'completed' => false,
            'user_id' => auth()->id()
        ]);

        // Then try to update without specifying user.
        $this->patch($task->path(), [
            'body' => 'changed',
            'completed' => true
        ]);

        // Must nbot have record in the DB
        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true
        ]);

    }
}

