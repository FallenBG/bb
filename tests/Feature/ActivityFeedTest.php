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
    public function creating_a_project_generates_activity()
    {
        $project = app(ProjectFactory::class)->create();

        $this->assertCount(1, $project->activity);

        $this->assertEquals('created', $project->activity[0]->description);
    }

    /** @test */
    public function updating_a_project_generates_activity()
    {
        $project = app(ProjectFactory::class)->create();

        $project->update(['title' => 'updated']);

        $this->assertEquals('updated', $project->activity->last()->description);
        $this->assertCount(2, $project->activity);
    }
}
