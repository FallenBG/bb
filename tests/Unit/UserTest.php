<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_user_has_objects()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }
    
    /** @test */
    public function a_user_has_accessible_projects()
    {
        $user = $this->signIn();
        app(ProjectFactory::class)->ownedBy($user)->create();

        $this->assertCount(1, $user->accessibleProjects());

        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();

        $project = tap(app(ProjectFactory::class)->ownedBy($user2)->create())->invite($user3);

        $this->assertCount(1, $user->accessibleProjects());

        $project->invite($user);

        $this->assertCount(2, $user->accessibleProjects());
    }
}
