<?php

namespace Tests\Feature\Process;

use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Delete a specific process.
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

        $response = $this->delete(route('processes.destroy', $process->id));

        $response->assertSuccessful();
    }
}
