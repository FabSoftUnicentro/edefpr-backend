<?php

namespace Tests\Feature\Attendment;

use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\Attendment;
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
     * @test Get all attendments paginated
     */
    public function testIndex()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        factory(Attendment::class, 5)->create([

        ]);

        $response =  $this->actingAs($admin)->get('/attendment');

        $attendment = Attendment::paginate(10);

        $response->assertResource(AttendmentResource::collection($attendment));
    }
}
