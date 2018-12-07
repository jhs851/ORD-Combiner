<?php

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModifyUserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var User
     */
    protected $john;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->john = create(User::class, ['name' => 'JohnDoe']);

        $this->john->markEmailAsVerified();

        $this->signIn($this->john);
    }

    /** @test */
    function users_cannot_change_other_users_information()
    {
        $jane = create(User::class, ['name' => 'JaneDoe']);

        $jane->markEmailAsVerified();

        $this->expectException(AuthorizationException::class);

        $this->get(route('users.edit', $jane->id))->assertRedirect(route('home'));
    }

    /** @test */
    function users_can_change_their_information()
    {
        $this->put(route('users.update', $this->john->id), ['name' => 'Updated', 'tel' => '01012341234'])
             ->assertRedirect(route('users.edit', $this->john->id));

        $this->assertDatabaseHas('users', ['name' => 'Updated']);
    }

    /** @test */
    function users_can_opt_out_if_they_want()
    {
        $this->delete(route('users.destroy', $this->john->id), ['remove_confirm' => '1'])
             ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('users', ['name' => $this->john->name]);
    }
}
