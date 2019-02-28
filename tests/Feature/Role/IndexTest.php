<?php

namespace Tests\Feature\Role;

use App\Http\Resources\Role as RoleResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
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
     * @test Get all roles paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $response =  $this->actingAs($admin)->get('/role');

        $roles = Role::paginate(10);

        $response->assertResource(RoleResource::collection($roles));
    }

    /**
     * @test Get all roles
     */
    public function testIndexWithoutPagination()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $response =  $this->actingAs($admin)->get('/role/?paginate=0');

        $roles = Role::all();

        $response->assertResource(RoleResource::collection($roles));
    }
}
