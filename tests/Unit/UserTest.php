<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function testExample()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
