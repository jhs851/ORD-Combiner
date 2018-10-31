<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) return call_user_func(static::$toMailCallback, $notifiable, $this->token);

        return (new MailMessage)
            ->subject(sprintf("[%s] %s", config('app.name'), '비밀번호를 초기화하세요.'))
            ->line('귀하의 계정에 대한 비밀번호 재설정 요청을 받았기 때문에 본 이메일이 발송되었습니다.')
            ->action('비밀번호 초기화', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('암호 재설정을 요청하지 않은 경우 더 이상의 조치가 필요하지 않습니다.');
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
