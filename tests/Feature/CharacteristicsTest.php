<?php

use App\Models\Characteristic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CharacteristicsTest extends TestCase
{
    use DatabaseMigrations;

    protected $characteristic;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->adminSignIn();

        $this->characteristic = create(Characteristic::class);
    }

    /** @test */
    function can_generate_characteristics()
    {
        $this->post(route('admin.characteristics.store'), [
            'name'   => 'Test',
            'regexp' => 'Test',
        ]);

        $this->assertDatabaseHas('characteristics', ['name' => 'Test']);
    }
    
    /** @test */
    function can_change_characteristics()
    {
        $this->put(route('admin.characteristics.update', $this->characteristic->id), [
            'name'   => 'Updated',
            'regexp' => $this->characteristic->regexp,
        ]);

        $this->assertDatabaseHas('characteristics', ['name' => 'Updated']);
    }

    /** @test */
    function can_delete_characteristics()
    {
        $this->delete(route('admin.characteristics.destroy', $this->characteristic->id));

        $this->assertDatabaseMissing('characteristics', ['name' => $this->characteristic->name]);
    }
}
