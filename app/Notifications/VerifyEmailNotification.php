<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Override;

class VerifyEmailNotification extends BaseVerifyEmailNotification
{
    #[Override]
    public function toMail(mixed $notifiable): MailMessage
    {
        assert($notifiable instanceof MustVerifyEmail);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1((string) $notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage())
            ->subject('Подтверждение email адреса')
            ->view('emails.verify-email', [
                'url' => $verificationUrl,
            ]);
    }
}

