<?php

namespace Tests\Feature\Assisted;

use App\Http\Resources\Assisted as AssistedResource;
use App\Models\Assisted;
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
     * @test Get a specific assisted
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $assisted = factory(Assisted::class)->create();

        $response =  $this->actingAs($admin)->get('/assisted/' . $assisted->id);

        $response->assertResource(AssistedResource::make($assisted));
    }
}
