<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendToUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data_surat;
    public $data_admin;
    public $data_pengaju;
    public $data_status_terakhir;


    /**
     * Create a new message instance.
     */
    public function __construct(array $data_email)
    {
        $this->data_surat = $data_email['data_surat'];
        $this->data_admin = $data_email['data_admin'];
        $this->data_pengaju = $data_email['data_pengaju'];
        $this->data_status_terakhir = $data_email['data_status_terakhir'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->data_admin->email, $this->data_admin->username),
            subject: "Suratmu Baru Saja {$this->data_status_terakhir}"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send_to_user',
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
}
