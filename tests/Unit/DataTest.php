<?php

namespace Tests\Unit;

use Tests\TestCase;

class DataTest extends TestCase
{
    public function test_data_url_true_response()
    {
        $this->post('api/hotels')
            ->assertStatus(200);
    }
}
