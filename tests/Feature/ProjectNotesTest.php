<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectNotesTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_user_can_update_note()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $project = auth()->user()->projects()->create(
                factory('App\Project')->raw()
        );

        $note = factory('App\Note')->create();

        $this->patch($project->path() . '/note/' . $note->id, [
            'body' => 'updated Note'
        ]);

        $this->assertDatabaseHas('Notes', [
            'body' => 'updated Note'
        ]);

    }


    /** @test */
    public function a_user_can_see_note()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $project = auth()->user()->projects()->create(
                factory('App\Project')->raw()
        );

        $note = $project->addNote([
            'body' => 'can see Note',
            'project_id' => $project->id
        ]);


        $this->patch($project->path() . '/note/' . $note->id, [
            'body' => 'can see Note'
        ]);


        $this->get($project->path())->assertSee('can see Note');
    }

    // useless as we don't have show for notes
//    /** @test */
//    public function a_user_cannot_view_other_users_notes()
//    {
////        $this->withoutExceptionHandling();
//        $this->signIn();
//
//        $project = factory('App\Project')->create();
//
//        $note = $project->addNote([
//            'body' => 'can see Note',
//            'project_id' => $project->id
//        ]);
//
//        $this->get($project->path())->assertStatus(403);
//    }

    /** @test */
    public function a_user_cannot_update_other_users_notes()
    {
//        $this->withoutExceptionHandling();
        $this->signIn();

        $project = factory('App\Project')->create();

        $note = $project->addNote([
            'body' => 'cannot see Note',
            'project_id' => $project->id
        ]);

        $this->patch($project->path() . '/note/' . $note->id)->assertStatus(403);
    }
}
