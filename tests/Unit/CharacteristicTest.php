<?php

namespace Tests\Unit;

use App\Models\Characteristic;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CharacteristicTest extends TestCase
{
    /** @test */
    function it_has_all_characteristics()
    {
        $this->assertEquals(count(config('characteristics')), Characteristic::count());
    }

    /** @test */
    function it_can_belongs_to_many_units()
    {
        $this->assertInstanceOf(Collection::class, Characteristic::first()->units);
    }
}
