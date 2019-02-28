<?php

namespace Tests\Feature\City;

use App\Http\Resources\City as CityResource;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
     * @test Get all cities paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(City::class, 1)->create();

        $response = $this->actingAs($admin)->get('/city');

        $cities = City::orderBy('name', 'asc')->paginate(10);

        $response->assertResource(CityResource::collection($cities));
    }

    /**
     * @test Get all cities
     */
    public function testIndexWithoutPagination()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(City::class, 1)->create();

        $response = $this->actingAs($admin)->get('/city/?paginate=0');

        $cities = City::orderBy('name', 'asc')->get();

        $response->assertResource(CityResource::collection($cities));
    }
}
