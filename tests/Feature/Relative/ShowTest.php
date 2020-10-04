<?php

namespace Tests\Feature\Relative;

use App\Http\Resources\Relative as RelativeResource;
use App\Models\Relative;
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
     * @test Get a specific relative
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $relative = factory(Relative::class)->create();

        $response =  $this->actingAs($admin)->get('/relative/' . $relative->id);

        $response->assertResource(RelativeResource::make($relative));
    }
}
