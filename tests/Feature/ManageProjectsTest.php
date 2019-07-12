<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
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

//    /** @test */
//    public function guests_may_not_create_projects()
//    {
//        // When the result is exception - make sure we handle it or we fail the test!!!!
////        $this->withoutExceptionHandling();
////        $this->handleValidationExceptions();
//
//        $attributes = factory('App\Project')->raw();
////        dd($attributes);
//        $this->post('/projects', $attributes)->assertRedirect('/login');
//    }
//
//    /** @test */
//    public function guests_may_not_view_projects()
//    {
//        // When the result is exception - make sure we handle it or we fail the test!!!!
////        $this->withoutExceptionHandling();
////        $this->handleValidationExceptions();
//
//        $attributes = factory('App\Project')->raw();
////        dd($attributes);
//        $this->get('/projects', $attributes)->assertRedirect('/login');
//    }
//
//    /** @test */
//    public function guests_may_not_view_single_project()
//    {
//        // When the result is exception - make sure we handle it or we fail the test!!!!
////        $this->withoutExceptionHandling();
////        $this->handleValidationExceptions();
//
//        $project = factory('App\Project')->create();
////        dd($project->path());
//        $this->get($project->path())->assertRedirect('/login');
//    }

    /** @test */
    public function a_user_can_create_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

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

        $response = $this->post('/projects', $attributes)->assertRedirect('/projects');

//        dd(get_class($response));
//        $response->dump();
//        dd(\DB::getQueryLog());


        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }


    /** @test */
    public function a_user_can_view_their_project()
    {
//        $this->withoutExceptionHandling();

        $this->be(factory('App\User')->create());

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);
//        dd($project);
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
    
    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->be(factory('App\User')->create());
//        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->actingAs(factory('App\User')->create());
        // Make fake model for Project and set title = ''
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

}
