<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\NewUser;

class StudentRegistrationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $student;
    protected $store;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $store, $password)
    {
        $this->student = $student;
        $this->store = $store;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::channel('email')->info('Enviando e-mail de registro para: ' . $this->student->email);

        return (new NewUser($this->student, $this->store, $this->password))
        ->to($this->student->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
