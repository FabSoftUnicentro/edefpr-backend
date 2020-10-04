<?php

namespace Tests\Feature\Assisted;

use App\Models\Assisted;
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
     * @test Delete a specific assisted
     */
    public function testDestroy()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $assisted = factory(Assisted::class)->create([
            'name' => 'Test 1'
        ]);

        $response = $this->actingAs($admin)->get(route('assisteds.show', $assisted->getKey()));

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->delete(route('assisteds.destroy', $assisted->getKey()));

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->get(route('assisteds.show', $assisted->getKey()));

        $response->assertNotFound();
    }
}
