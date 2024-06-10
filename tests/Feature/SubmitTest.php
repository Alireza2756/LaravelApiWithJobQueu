<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SubmitTest extends TestCase
{
    use RefreshDatabase;

    public function test_submit_endpoint()
    {
        Queue::fake();

        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Submission received and is being processed']);

        Queue::assertPushed(\App\Jobs\ProcessSubmission::class);
    }

    public function test_validation_error()
    {
        $response = $this->postJson('/api/submit', []);

        $response->assertStatus(400)
            ->assertJsonStructure(['errors' => ['name', 'email', 'message']]);
    }
}
