<?php

namespace App\Mail;

use App\Models\Admin\BarangkeluarModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    // use BarangkeluarModel;
    // use App\Models\Admin\BarangkeluarModel;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data= $data;
        // $this->bk_jumlah= $bk_jumlah;

    }

    // public function toMail(object $notifiable) : MailMessage {
    //     return (new MailMessage)
    //     ->greeting('tujuanATK, '. $this->user->bk_tujuan)
    //     ->line ('welcome to '.config('app.name'))
    //     ->action('view', url('http://127.0.0.1:8000/admin/barang-keluar'))
    //     ->line('thenks using ATK-MGM bro');

    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Request Barang ATK'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // markdown: 'emailku',
            // markdown: 'emailku',
            // view: 'emailku',
            // with: ['name' => $this->name],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Request Barang ATK')
                    ->view('email.testemail');
    }
}
