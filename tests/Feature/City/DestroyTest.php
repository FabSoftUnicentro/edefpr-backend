<?php

namespace Tests\Feature\City;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Delete a specific city
     */
    public function testDestroy()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $city = factory(City::class)->create();

        $response = $this->actingAs($admin)->get('/city/' . $city->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->delete('/city/' . $city->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->get('/city/' . $city->id);

        $response->assertNotFound();
    }
}
