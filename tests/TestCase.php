<?php

namespace Tests;

use App\Models\{User, Version};
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var Version
     */
    protected $version;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->version = create(Version::class);

        version($this->version);
    }

    /**
     * @param User|null $user
     * @return $this
     */
    protected function signIn(User $user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);

        return $this;
    }

    /**
     * @return $this
     */
    protected function adminSignIn()
    {
        return $this->signIn(create(User::class, ['email' => config('auth.admin.email')[0]]));
    }
}
