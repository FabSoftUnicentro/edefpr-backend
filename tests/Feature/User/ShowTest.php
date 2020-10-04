<?php

namespace Tests\Feature\User;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get a specific user
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $user = factory(User::class)->create();

        $response =  $this->actingAs($admin)->get('/user/' . $user->id);

        $response->assertResource(UserResource::make($user));
    }
}
