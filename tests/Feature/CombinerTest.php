<?php

use Tests\TestCase;

class CombinerTest extends TestCase
{
    /** @test */
    function normal_operation()
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
