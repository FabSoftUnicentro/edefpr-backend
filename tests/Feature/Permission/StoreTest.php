<?php

namespace Tests\Feature\Permission;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Store a specific permission
     */
    public function testStore()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $permission = [
            "name"=> "Test 1",
            'description' => 'Test 1'
        ];

        $response = $this->actingAs($admin)->post('/permission/', $permission);

        $response->assertSuccessful();
    }
}
