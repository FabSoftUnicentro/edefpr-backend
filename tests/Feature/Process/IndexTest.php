<?php

namespace Tests\Feature\Process;

use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get all processes.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $user->assignRole('master');

        $this->actingAs($user);

        factory(Process::class, 5)->create();

        $response = $this->get(route('processes.index'));

        $response->assertSuccessful();
    }
}
