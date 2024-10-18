<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;

class VerifyTeacherEmail extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // $verificationUrl = URL::temporarySignedRoute(
        //     'verification.verify', now()->addMinutes(60), ['id' => $this->user->id, 'hash' => sha1($this->user->email)]);
        $url = route('teacher.profile-complete', ['email' => $this->user->email]);

        return (new MailMessage)
                    ->subject('Complete Your Teacher Profile')
                    ->greeting('Hello ' .  $this->user->name . ',')
                    ->line('Thank you for registering as a teacher. Before you can start using your account, you need to complete your profile.')
                    ->action('Complete Your Profile', $url)
                    ->line('Click the button above to complete your teacher profile. You won’t be able to access other features until your profile is complete.')
                    ->line('If you did not register for this account, please ignore this email.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
