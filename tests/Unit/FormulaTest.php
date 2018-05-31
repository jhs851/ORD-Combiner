<?php

namespace Tests\Unit;

use App\{
    Formula, Unit
};
use Tests\TestCase;

class FormulaTest extends TestCase
{
    /** @test */
    function it_has_all_formulas()
    {
        $this->assertEquals($this->getFormulasCount(), Formula::count());
    }

    /** @test */
    function it_can_belongs_to_unit()
    {
        $this->assertInstanceOf(Unit::class, Formula::first()->unit);
    }

    /**
     * @return float|int
     */
    protected function getFormulasCount() : int
    {
        $count = 0;
        $formulas = config('formulas');

        foreach ($formulas as $rate =>$formula) {
            foreach ($formula as $unit => $recipes) {
                $count += count($recipes);
            }
        }

        return $count;
    }
}
