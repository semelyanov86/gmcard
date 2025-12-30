<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Override;

class ResetPasswordNotification extends BaseResetPasswordNotification
{
    #[Override]
    public function toMail(mixed $notifiable): MailMessage
    {
        assert($notifiable instanceof CanResetPassword);

        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $expire = config('auth.passwords.users.expire', 60);

        return (new MailMessage())
            ->subject('Восстановление пароля')
            ->view('emails.reset-password', [
                'url' => $url,
                'expire' => $expire,
            ]);
    }
}
