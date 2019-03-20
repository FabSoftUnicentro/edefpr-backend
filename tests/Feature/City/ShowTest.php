<?php

namespace Tests\Feature\City;

use App\Http\Resources\City as CityResource;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get a specific city
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $city = factory(City::class)->create();

        $response = $this->actingAs($admin)->get('/city/' . $city->id);

        $response->assertResource(CityResource::make($city));
    }
}
