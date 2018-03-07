<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\ActingEmployee;

class HRNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $actingEmployees;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($actingEmployees)
    {
        //
        $this->actingEmployees=$actingEmployees;
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
        $url = url('/invoice/'.'1');

        return (new MailMessage)
        ->subject('Acting Employees')
        ->markdown('mail.hr.acting', ['url' => $url,'actingEmployees'=> $this->actingEmployees]);
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
