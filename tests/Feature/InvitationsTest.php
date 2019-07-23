<?php

namespace Tests\Feature;

use App\User;
use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_project_an_invite_a_user()
    {
        $this->withoutExceptionHandling();
        $project = app(ProjectFactory::class)
            ->ownedBy($this->signIn())
            ->withTasks(1)
            ->withNote()
            ->create();

        $project->invite($newUser = factory(User::class)->create());

        $this->actingAs($newUser)->post(action('ProjectTasksController@store', $project), $task = [
            'body' => 'new user task'
        ]);

        $this->assertDatabaseHas('tasks', $task);
    }
}
