<?php

namespace App\Notifications;

use App\Models\Admin\BarangkeluarModel;
use App\Models\Admin\BarangMasukModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;
    private $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;        
    }

    /**
     * Get the notification's delivery channels.
     *
     * 
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
        // return $notifiable->prefers_sms ? ['vonage'] : ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
        return (new MailMessage)
            ->greeting('tujuanATK, '. $this->data)
            ->line ('welcome to '.config('app.name'))
            ->action('view', url('http://127.0.0.1:8000/admin/barang-keluar'))
            ->line('thenks using ATK-MGM bro');
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
