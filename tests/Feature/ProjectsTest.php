<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class ProjectsTest extends TestCase
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
    public function only_authenticated_user_can_create_project()
    {
        // When the result is exception - make sure we handle it or we fail the test!!!!
//        $this->withoutExceptionHandling();
//        $this->handleValidationExceptions();

        $attributes = factory('App\Project')->raw();
//        dd($attributes);
        $this->post('/projects', $attributes)->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

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
    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();
//        dd($project);
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
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
