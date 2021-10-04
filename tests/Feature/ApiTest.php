<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{

    public function test_user_can_get_user_collection()
    {
        $response = $this->get('api/users');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' =>
                [
                '*' => ['id', 'first_name', 'last_name']
                ]
            ]);
    }

    public function test_user_can_use_limit_parameter()
    {
        $limit = rand(1, 10);
        $response = $this->call('GET', 'api/users', ['limit' => $limit]);
        $responseCount = count($response->decodeResponseJson()['data']);

        $this->assertEquals($limit, $responseCount);
    }
}
