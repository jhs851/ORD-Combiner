<?php

namespace Tests\Unit;

use App\Unit;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /** @test */
    function it_has_all_units()
    {
        $this->assertEquals($this->getUnitsCount(), Unit::count());
    }

    /** @test */
    function it_can_has_many_formulas()
    {
        $this->assertInstanceOf(Collection::class, Unit::first()->formulas);
    }

    /**
     * @return float|int
     */
    protected function getUnitsCount() : int
    {
        return array_sum(array_map(function($unit) {
            return count($unit);
        }, config('units')));
    }
}
