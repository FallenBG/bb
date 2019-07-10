<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;

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
    public function a_user_can_create_project()
    {
        $this->withExceptionHandling();

        $attributes = [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph
        ];

//        \DB::enableQueryLog();

        $response = $this->post('/projects', $attributes)->assertRedirect('/projects');

//        dd(get_class($response));
//        $response->dump();
//        dd(\DB::getQueryLog());


        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        // Make fake model for Project and set title = ''
        $attr = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attr)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $attr = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attr)->assertSessionHasErrors('description');
    }
}
