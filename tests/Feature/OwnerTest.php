<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OwnerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_registration_screen_onwner_can_be_rendered()
    {
        $response = $this->get('/owner');
 
        $response->assertStatus(200);
    }
 
    public function test_new_owner_can_register()
    {
        $response = $this->post('/owner', [
            'name' => 'Test',
            'last_name' => 'Owner',
            'email' => 'test@example.com',
        ]);
 
        $response->assertRedirect('/owner');
    }

}
