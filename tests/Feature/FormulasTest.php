<?php

use App\Models\{Formula, Unit, Upper};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FormulasTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Unit
     */
    protected $unit;

    /**
     * @var Formula
     */
    protected $formula;

    /**
     * @var Upper
     */
    protected $upper;

    protected function setUp()
    {
        parent::setUp();

        $this->adminSignIn();

        $this->unit = create(Unit::class);

        $this->formula = create(Formula::class);

        $this->upper = $this->formula->upper;
    }

    /** @test */
    function can_create_a_formula_and_generating_formulas_also_creates_uppers()
    {
        create(Unit::class, ['name' => Unit::WISP_NAME]);

        $this->post(route('admin.formulas.store'), ['target_id' => $this->unit->id])
             ->assertStatus(200);

        $this->assertDatabaseHas('formulas', ['target_id' => $this->unit->id])
             ->assertEquals(Formula::count(), Upper::count());
    }

    /** @test */
    function the_formula_can_be_changed_and_when_the_formula_is_changed_the_upper_is_also_changed()
    {
        $this->put(route('admin.formulas.update', $this->formula->id), ['unit_id' => $this->unit->id])
             ->assertStatus(200);

        $this->assertDatabaseHas('formulas', ['unit_id' => $this->unit->id])
             ->assertEquals($this->formula->fresh()->unit_id, $this->upper->fresh()->target_id);
    }

    /** @test */
    function formula_can_be_deleted_and_deletion_of_formula_will_result_in_deletion_of_the_upper()
    {
        $this->delete(route('admin.formulas.destroy', $this->formula->id));

        $this->assertDatabaseMissing('formulas', ['id' => $this->formula->id])
             ->assertDatabaseMissing('uppers', ['id' => $this->upper->id]);
    }
}
