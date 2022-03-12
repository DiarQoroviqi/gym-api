<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected string $token)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject(__('Account Created'))
            ->line(__('Your account has been created.'))
            ->line(__('You can reset your password by going to the link below.'))
            ->action(__('Reset Your Password'), $this->url($notifiable));
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }

    private function url($notifiable): string
    {
        return config('services.frontend.reset_password_url') . '?' . http_build_query([
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);
    }
}
