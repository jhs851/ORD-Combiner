<?php

namespace Tests\Unit;

use App\Rate;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class RateTest extends TestCase
{
    /** @test */
    function it_has_all_rates()
    {
        $this->assertEquals(
            array_flatten(config('rates')),
            array_flatten(Rate::orderBy('id', 'asc')->without('units')->get(['name', 'color'])->toArray())
        );
    }

    /** @test */
    function it_has_many_units()
    {
        $this->assertInstanceOf(Collection::class, Rate::first()->units);
    }
}
