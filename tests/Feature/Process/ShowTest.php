<?php

namespace Tests\Feature\Process;

use App\Models\Process;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get a specific process.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $user->assignRole('master');

        $this->actingAs($user);

        $process = factory(Process::class)->create();

        $response = $this->get(route('processes.show', $process->id));

        $response->assertSuccessful();
    }
}
