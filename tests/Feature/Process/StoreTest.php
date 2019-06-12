<?php

namespace Tests\Feature\Process;

use App\Models\Assisted;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Store a specific process
     *
     * @return void
     */
    public function testStore()
    {
        $user = factory(User::class)->create();

        $user->assignRole('master');

        $this->actingAs($user);

        $assisted = factory(Assisted::class)->create();

        $process = [
            'title' => 'Test process title',
            'description' => 'This is a test to create a process.',
            'assisted_id' => $assisted->id
        ];

        $this->post(route('processes.store', $process));

        $this->assertDatabaseHas('processes', [
            'title' => 'Test process title',
            'description' => 'This is a test to create a process.',
            'assisted_id' => $assisted->id
        ]);
    }
}
