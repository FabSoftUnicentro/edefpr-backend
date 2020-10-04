<?php

namespace Tests\Feature\Assisted;

use App\Models\Assisted;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Update a specific assisted
     */
    public function testUpdate()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $assisted = factory(Assisted::class)->create();

        $data = factory(Assisted::class)->make()->toArray();

        $response = $this->actingAs($admin)->put(route('assisteds.update', $assisted->getKey()), $data);

        $response->assertRedirect(route('assisteds.show', $assisted->getKey()));
    }
}
