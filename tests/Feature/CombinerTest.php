<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CombinerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_are_not_allowed_to_visit()
    {
        $this->get(route('home'))->assertStatus(302);
    }

    /** @test */
    function users_who_do_not_have_email_verification_cannot_visit()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->get(route('home'))->assertRedirect(route('verification.notice'));
    }
}
