<?php

namespace Tests\Feature\Process;

use App\Models\Process;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Update a specific process.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $user->assignRole('master');

        $this->actingAs($user);

        $process = factory(Process::class)->create([
            'title' => 'Test process title',
            'description' => 'This is a test to create a process.',
        ]);

        $this->assertDatabaseHas('processes', [
            'title' => 'Test process title',
            'description' => 'This is a test to create a process.',
        ]);

        $this->put(route('processes.update', [
            'id' => $process->id,
            'title' => 'Another test process title',
            'description' => 'This is a another test to create a process.',
        ]));

        $this->assertDatabaseHas('processes', [
            'title' => 'Another test process title',
            'description' => 'This is a another test to create a process.',
        ]);
    }
}
