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
//        $this->withoutExceptionHandling();
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        
        $this->post($project->path() . '/tasks', ['body' => 'Test Task', 'title' => 'Test Task 1', 'user_id' => auth()->id()]);
//dd('wwaat');
        $this->get($project->path())
            ->assertSee('Test Task');
    }

    /** @test */
    public function a_task_requires_a_title()
    {
//        $this->withoutExceptionHandling();
        $this->signIn();
        $project = factory(Project::class)->create();
        $attributes = factory('App\Task')->raw(['title' => '']);
        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_task_requires_a_body()
    {
//        $this->withoutExceptionHandling();
        $this->signIn();
        $project = factory(Project::class)->create();
        $attributes = factory('App\Task')->raw(['body' => '']);
        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }
}
