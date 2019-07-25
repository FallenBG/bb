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
    public function a_project_can_invite_a_user()
    {
        $this->withoutExceptionHandling();
        $project = app(ProjectFactory::class)->create();

        $userToInvite = factory(User::class)->create();
        $this->actingAs($project->owner)->post($project->path() . '/invitations', [
            'email' => $userToInvite->email
        ])
        ->assertRedirect($project->path());


        $this->assertTrue($project->members->contains($userToInvite));
    }

    /** @test */
    public function only_the_owner_can_invite_users_to_the_project()
    {
        $project = app(ProjectFactory::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user)->post($project->path() . '/invitations')->assertStatus(403);

        $project->invite($user);

        $this->actingAs($user)->post($project->path() . '/invitations')->assertStatus(403);
    }
    
    /** @test */
    public function the_invited_email_must_be_registered_into_the_site()
    {
//        $this->withoutExceptionHandling();
        $project = app(ProjectFactory::class)->create();


        $this->actingAs($project->owner)->post($project->path() . '/invitations', [
            'email' => "example@email.coms"
        ])->assertSessionHasErrors([
            'email' => 'The User you are inviting must have BB account.'
        ], null, 'invitations');
    }

    /** @test */
    public function invited_user_can_update_project_details()
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
