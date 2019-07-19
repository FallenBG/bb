<?php

namespace Tests\Feature;

use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project_records_activity()
    {
        $project = app(ProjectFactory::class)->create();

        $this->assertCount(1, $project->activity);

        $this->assertEquals('created', $project->activity[0]->description);
    }

    /** @test */
    public function updating_a_project_records_activity()
    {
        $project = app(ProjectFactory::class)->create();

        $project->update(['title' => 'updated']);

        $this->assertEquals('updated', $project->activity->last()->description);
        $this->assertCount(2, $project->activity);
    }

    /** @test */
    public function creating_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $this->assertCount(2, $project->activity);
    }

    /** @test */
    public function updating_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $project->tasks[0]->update(['body' => 'updated']);

        $this->assertEquals('task_updated', $project->activity->last()->description);
        $this->assertCount(3, $project->activity);
    }

    /** @test */
    public function completing_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $project->tasks[0]->update(['completed' => 1]);

        $this->assertEquals('task_completed', $project->activity->last()->description);
        $this->assertCount(3, $project->activity);
    }
}
