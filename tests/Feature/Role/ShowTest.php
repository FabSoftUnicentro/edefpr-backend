<?php

namespace Tests\Feature\Role;

use App\Http\Resources\Role as RoleResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
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
     * @test Get a specific role
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $role = Role::create([
            'name' => 'test',
            'description' => 'Test 1'
        ]);

        $response =  $this->actingAs($admin)->get('/role/' . $role->id);

        $response->assertResource(RoleResource::make($role));
    }
}
