<?php

namespace Tests\Feature\CounterPart;

use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;
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
     * @test Get all counterparts paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(CounterPart::class, 5)->create();

        $response =  $this->actingAs($admin)->get('/counter-part');

        $counterparts = CounterPart::paginate(10);

        $response->assertResource(CounterPartResource::collection($counterparts));
    }
}
