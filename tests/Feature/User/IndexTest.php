<?php

namespace Tests\Feature\User;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get all users paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(User::class, 1)->create();

        $response =  $this->actingAs($admin)->get('/user');

        $users = User::paginate(10);

        $response->assertResource(UserResource::collection($users));
    }
}
