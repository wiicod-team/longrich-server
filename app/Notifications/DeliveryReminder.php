<?php

namespace App\Notifications;

use App\Delivery;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalButton;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class DeliveryReminder extends Notification
{
    use Queueable;
    private $user;
    private $delivery;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Delivery $d)
    {
        //
        $this->delivery = $d;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

    public function toOneSignal($notifiable)
    {
        $body = $this->getMessage($notifiable);
        $express = $this->delivery->is_express ? "express" : "";
        $img= env('APP_URL')."icon.png";
        if($this->delivery->bill->bill_product()->exist())
            $img = $this->delivery->bill->bill_product()->first()->product->picture1;

        return OneSignalMessage::create()
            ->subject("Aune nouvelle commande {$express} de {$this->delivery->bill->amount} FCFA  !!!")
            ->body($body)
            ->button(
                OneSignalButton::create('delivery')
                    ->text('Details')
//                    ->icon($this->film->poster)
            )
            ->setData('delivery_id', $this->delivery->id)
            ->setData('channel', 'delivery_reminder')
            ->setImageAttachments($img);
    }

    private function getMessage($notifiable)
    {
        $this->user = $notifiable;
        $express = $this->delivery->is_express ? "express" : "";
        $body = "Bonjour M./Mme {$this->user->name} une nouvelle commande {$express} a {$this->delivery->road}"
         ." de {$this->delivery->bill->amount} FCFA ";

        return $body;
    }
}
