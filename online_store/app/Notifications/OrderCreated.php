<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreated extends Notification  implements ShouldQueue
{
    use Queueable;

    public $id;
    public $data;
    public $summ;    
  
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id , $data , $summ)
    {
        $this->summ = $summ;
        $this->id = $id;
        $this->data = $data;
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
        return (new MailMessage)
                  ->greeting('Привет!')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!')
                    ->line($this->summ)
                    ->line($this->id)
                    ->line($this->data['first_name'])
                    ->line($this->data['last_name'])
                    ->line($this->data['middle_name']);

                    //->subject('Тема уведомления') Изменить тему
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
