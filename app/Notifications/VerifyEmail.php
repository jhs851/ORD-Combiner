<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Notifications\{Notification, Messages\MailMessage};
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

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
        if (static::$toMailCallback) return call_user_func(static::$toMailCallback, $notifiable);

        return (new MailMessage)
            ->subject(sprintf("[%s] %s", config('app.name'), '회원가입을 확인해주세요.'))
            ->line('이메일 주소를 확인하려면 아래 버튼을 클릭하십시오.')
            ->action('이메일 확인', $this->verificationUrl($notifiable))
            ->line('계정을 만든 적이 없다면 더 이상의 조치가 필요하지 않습니다.');
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );
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
