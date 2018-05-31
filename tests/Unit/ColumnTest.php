<?php

namespace Tests\Unit;

use App\Column;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ColumnTest extends TestCase
{
    /** @test */
    function it_has_seven_columns()
    {
        $this->assertEquals(7, Column::count());
    }

    /** @test */
    function it_has_many_rates()
    {
        $this->assertInstanceOf(Collection::class, Column::first()->rates);
    }
}
