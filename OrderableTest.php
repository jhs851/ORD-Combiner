<?php

use App\Models\Rate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrderableTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function when_there_is_nothing_in_the_column_the_order_is_stored_as_zero()
    {
        $this->adminSignIn();

        $rate = create(Rate::class);

        $this->assertEquals(0, $rate->order);
    }

    /** @test */
    function if_one_rate_exists_in_a_column_the_order_is_automatically_saved_as_1()
    {
        $this->adminSignIn();

        create(Rate::class, ['column_id' => 1]);

        $rate = create(Rate::class, ['column_id' => 1]);

        $this->assertEquals(1, $rate->order);
    }
}
