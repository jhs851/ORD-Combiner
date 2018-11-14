<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use phpDocumentor\Reflection\Types\This;
use UnitsTest;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
