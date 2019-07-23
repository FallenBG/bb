<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Support\Facades\App;
use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class ManageProjectsTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    /** @test */
    public function guests_cannot_manage_projects()
    {
        // When the result is exception - make sure we handle it or we fail the test!!!!
//        $this->withoutExceptionHandling();
//        $this->handleValidationExceptions();

        $project = factory('App\Project')->create();
//        dd($attributes);
        $this->get('/projects/create')->assertRedirect('/login');
        $this->get('/projects')->assertRedirect('/login');
        $this->get($project->path())->assertRedirect('/login');
        $this->post('/projects', $project->toArray())->assertRedirect('/login');
    }

    /**
     * BEllow code is represented above in a single function
     * Is ot a good solution or not - depends.
     */

    /** @test */
    public function guests_may_not_create_projects()
    {
        // When the result is exception - make sure we handle it or we fail the test!!!!
//        $this->withoutExceptionHandling();
//        $this->handleValidationExceptions();

        $attributes = factory('App\Project')->raw();
        $this->post('/projects', $attributes)->assertRedirect('/login');
    }

    /** @test */
    public function guests_may_not_view_projects()
    {
        $attributes = factory('App\Project')->raw();
        $this->get('/projects', $attributes)->assertRedirect('/login');
    }
//
    /** @test */
    public function guests_may_not_view_single_project()
    {
        $project = factory('App\Project')->create();
        $this->get($project->path())->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_project()
    {
//        $this->withoutExceptionHandling();

//        $this->actingAs(factory('App\User')->create());
        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

//        $attributes = [
//            'title'         => $this->faker->sentence,
//            'description'   => $this->faker->paragraph
//        ];

//        \DB::enableQueryLog();

        $attributes = [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph,
        ];

        $response = $this->post('/projects', $attributes);

        $project = Project::where($attributes)->first();
        $response->assertRedirect($project->path());
//        dd(get_class($response));
//        $response->dump();
//        dd(\DB::getQueryLog());


        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }


    /** @test */
    public function a_user_can_update_project()
    {
        $this->withoutExceptionHandling();
        $project = \app(ProjectFactory::class)->withNote()->create();

//        dd($project->path());
//        $project->update([
//            'description' => 'updated body',
//            'title'     => 'changed title'
//        ]);
//
//        $this->assertDatabaseHas('projects', [
//            'description' => 'updated body',
//            'title'        => 'changed title'
//        ]);

        $this->actingAs($project->owner)
            ->patch($project->path(), $attr = ['title' => 'changed title', 'description' => 'updated body'])
            ->assertRedirect($project->path());

        $this->get($project->path())->assertOk();

        $this->assertDatabaseHas('projects', $attr);
    }


    /** @test */
    public function a_guest_cannot_delete_project()
    {
//        $this->withoutExceptionHandling();
        $project = \app(ProjectFactory::class)->withNote()->create();

        $this->delete($project->path())->assertRedirect('/login');

        $this->signIn();

        $this->delete($project->path())->assertStatus(403);

    }


    /** @test */
    public function a_user_can_delete_project()
    {
//        $this->withoutExceptionHandling();
        $project = \app(ProjectFactory::class)->ownedBy($this->signIn())->withNote()->create();

        $this->actingAs($project->owner)
            ->delete($project->path())
            ->assertRedirect('/projects');

        $this->get($project->path())->assertStatus(404);

        $this->assertDatabaseMissing('projects', ['id' => $project->id]); // $project->only('id')
    }


    /** @test */
    public function a_user_can_view_their_project()
    {
        $project = app(ProjectFactory::class)
            ->ownedBy($this->signIn())
            ->create(false);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
    
    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
//        $this->be(factory('App\User')->create());
        $this->signIn();
//        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();
        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
//        $this->actingAs(factory('App\User')->create());
        $this->signIn();
        // Make fake model for Project and set title = ''
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
//        $this->withoutExceptionHandling();
//        $this->actingAs(factory('App\User')->create());
        $this->signIn();

        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

}
