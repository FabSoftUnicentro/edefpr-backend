<?php

namespace Tests\Feature\Permission;

use App\Http\Resources\Permission as PermissionResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get all permissions paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $response = $this->actingAs($admin)->get('/permission');

        $permissions = Permission::paginate(10);

        $response->assertResource(PermissionResource::collection($permissions));
    }
}
