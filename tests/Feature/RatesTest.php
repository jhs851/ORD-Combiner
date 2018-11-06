<?php

use App\Exceptions\AdministrationException;
use App\Models\{Column, Rate, User};
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RatesTest extends TestCase
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

        create(Column::class);
    }

    /** @test */
    function guests_cannot_create_new_rate()
    {
        $this->expectException(AuthenticationException::class);

        $this->post(route('admin.rates.store'), [])->json();
    }

    /** @test */
    function general_users_cannot_create_new_rate()
    {
        $this->signIn(create(User::class));

        $this->expectException(AdministrationException::class);

        $this->post(route('admin.rates.store'), [])->json();
    }

    /** @test */
    function create_new_rate()
    {
        $this->adminSignIn();

        $this->post(route('admin.rates.store'), [
            'column_id' => 1,
            'name'      => 'Test',
            'color'     => '#000',
        ])->json();

        $this->assertDatabaseHas('rates', ['name' => 'Test']);
    }
    
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

    /** @test */
    function update_rate()
    {
        $this->adminSignIn();

        $rate = create(Rate::class);

        $this->put(route('admin.rates.update', $rate->id), [
            'name'  => 'Updated',
            'color' => $rate->color,
        ]);

        $this->assertDatabaseHas('rates', ['name' => 'Updated']);
    }

    /** @test */
    function destroy_rate()
    {
        $this->adminSignIn();

        $attributes = ['name' => 'Test'];

        $rate = create(Rate::class, $attributes);

        $this->delete(route('admin.rates.destroy', $rate->id));

        $this->assertDatabaseMissing('rates', $attributes);
    }

    /**
     * @return RatesTest
     */
    protected function adminSignIn() : RatesTest
    {
        return $this->signIn(create(User::class, ['email' => config('auth.admin.email')[0]]));
    }
}
