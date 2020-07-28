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
                    ->line('Заказ успешно создан.')
                    ->action('Notification Action', url('/'))
                    ->line('Спасибо за заказ!')
                    ->line("Сумма заказа: ".$this->summ)
                    ->line('Номер заказа: '.$this->id)
                    ->line('Будем рады вас видеть снова, уважаемый '.$this->data['last_name'].' '.$this->data['first_name'].' '.$this->data['middle_name']);
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
