<?php

namespace Tests\Feature\Assisted;

use App\Models\Assisted;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get all assisteds paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(Assisted::class, 5)->create();

        $response =  $this->actingAs($admin)->get(route('assisteds.index'));

        $response->assertSuccessful();
    }
}
