<?php

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function the_page_is_working()
    {
        $this->get(route('register'))->assertStatus(200);
    }
    
    /** @test */
    function receive_data_to_the_user_correctly()
    {
        foreach ((new User())->getFillable() as $field)
            $this->get(route('register'))
                 ->assertSee('name="' . $field . '"');
    }

    /** @test */
    function data_is_generated_when_the_data_is_transmitted_correctly()
    {
        $email = 'john@example.com';

        $this->register($email);

        $this->assertDatabaseHas('users', compact('email'));
    }

    /** @test */
    function after_register_go_to_the_verify_notice_page_and_send_a_verification_email()
    {
        $this->register()->assertRedirect(route('verification.notice'));
    }

    /** @test */
    function after_visit_verification_notice_page_send_a_verification_email()
    {
        $fake = Notification::fake();

        $user = create(User::class);

        $this->signIn($user);

        $this->get(route('verification.notice'));

        $fake->assertSentTo($user, VerifyEmail::class);
    }

    /**
     * @param $email
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function register($email = null)
    {
        return $this->post('/register', [
            'name'                  => 'John',
            'email'                 => $email ?: 'john@example.com',
            'password'              => 'foobar',
            'password_confirmation' => 'foobar',
            'tel'                   => '01012341234',
        ]);
    }
}
