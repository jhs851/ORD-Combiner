<?php

use App\Models\{Load, User};
use Illuminate\Auth\{Access\AuthorizationException, AuthenticationException};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoadsTest extends TestCase
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

        $this->john = create(User::class, ['name' => 'JohnDoe', 'email_verified_at' => now()]);
    }

    /** @test */
    function guests_cannot_see_the_code()
    {
        $this->expectException(AuthenticationException::class);

        $this->get(route('loads.index', $this->john->id));
    }

    /** @test */
    function a_user_without_permission_cannot_see_the_code()
    {
        $jane = create(User::class, ['name' => 'JaneDoe']);

        $this->signIn($this->john);

        $this->expectException(AuthorizationException::class);

        $this->get(route('loads.index', $jane->id));
    }

    /** @test */
    function can_add_load()
    {
        $this->signIn($this->john);

        $this->post(route('loads.store', $this->john->id), [
            'code'  => 'Test',
            'clear' => 1
        ])->assertStatus(200);

        $this->assertDatabaseHas('loads', ['code' => 'Test']);
    }
    
    /** @test */
    function can_update_load()
    {
        $this->signIn($this->john);

        $load = create(Load::class, ['user_id' => $this->john->id]);

        $this->put(
            route('loads.update', ['user' => $this->john->id, 'load' => $load->id]),
            ['code' => 'Updated', 'clear' => $load->clear]
        )->assertStatus(200);

        $this->assertDatabaseHas('loads', ['code' => 'Updated']);
    }
}
