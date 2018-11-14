<?php

use App\Exceptions\AdministrationException;
use App\Models\{Rate, Unit, User};
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UnitsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        create(Rate::class);
    }

    /** @test */
    function guests_cannot_create_new_unit()
    {
        $this->expectException(AuthenticationException::class);

        $this->post(route('admin.units.store'), [])->json();
    }

    /** @test */
    function general_users_cannot_create_new_unit()
    {
        $this->signIn(create(User::class));

        $this->expectException(AdministrationException::class);

        $this->post(route('admin.units.store'), [])->json();
    }

    /** @test */
    function create_new_unit()
    {
        $this->adminSignIn();

        $this->post(route('admin.units.store'), [
            'rate_id'     => 1,
            'name'        => 'Test',
            'description' => 'It is test.',
            'count'       => 0,
        ])->json();

        $this->assertDatabaseHas('units', ['name' => 'Test']);
    }

    /** @test */
    function update_unit()
    {
        $this->adminSignIn();

        $unit = create(Unit::class);

        $this->post(route('admin.units.update', $unit->id), [
            'name'  => 'Updated',
        ]);

        $this->assertDatabaseHas('units', ['name' => 'Updated']);
    }

    /** @test */
    function destroy_rate()
    {
        $this->adminSignIn();

        $attributes = ['name' => 'Test'];

        $unit = create(Unit::class, $attributes);

        $this->delete(route('admin.units.destroy', $unit->id));

        $this->assertDatabaseMissing('units', $attributes);
    }
}
