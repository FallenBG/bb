<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
        public function it_has_a_user()
    {
        $project = app(ProjectFactory::class)->ownedBy($this->signIn())->create();

        $this->assertEquals($project->owner_id, $project->activity->first()->user->id);

    }
}
