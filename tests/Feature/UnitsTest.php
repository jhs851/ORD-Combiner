<?php

use App\Models\{Formula, Rate, Unit};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UnitsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Rate
     */
    protected $rate;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->adminSignIn();

        $this->rate = create(Rate::class);
    }

    /** @test */
    function can_create_a_new_unit()
    {
        $this->post(route('admin.units.store'), [
            'rate_id' => $this->rate->id,
            'name'    => 'Test',
        ])->assertStatus(200);

        $this->assertDatabaseHas('units', ['name' => 'Test']);
    }

    /** @test */
    function when_create_a_unit_of_the_lowest_rate_a_wisp_formula_is_created()
    {
        create(Unit::class, ['name' => Unit::WISP_NAME]);

        $lowestRate = create(Rate::class, ['name' => Rate::LOWEST_NAME]);

        $this->post(route('admin.units.store'), [
            'rate_id' => $lowestRate->id,
            'name'    => 'Test',
        ])->assertStatus(200);

        $this->assertEquals(1, Formula::count());
    }

    /** @test */
    function the_unit_may_be_updated()
    {
        $unit = create(Unit::class);

        $this->post(route('admin.units.update', $unit->id), ['name' => 'Updated']);

        $this->assertDatabaseHas('units', ['name' => 'Updated']);
    }

    /** @test */
    function the_unit_can_be_deleted()
    {
        $attributes = ['name' => 'Test'];

        $unit = create(Unit::class, $attributes);

        $this->delete(route('admin.units.destroy', $unit->id));

        $this->assertDatabaseMissing('units', $attributes);
    }
}
