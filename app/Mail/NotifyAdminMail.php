<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class NotifyAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data_email;
    public $email_admin;
    public $nama_pembuat;
    public $perihal;
    public $kategori_surat;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data_email)
    {
        $this->data_email = $data_email;
        $this->email_admin = $data_email['email_admin'];
        $this->nama_pembuat = $data_email['nama_pembuat'];
        $this->perihal = $data_email['perihal'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('admin@sirata.com', 'Admin Sirata'),
            subject: 'Surat Masuk dari ' . $this->nama_pembuat,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send_to_admin',
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
