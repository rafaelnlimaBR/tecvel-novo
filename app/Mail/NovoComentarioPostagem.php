<?php

namespace App\Mail;

use App\Models\Comentario;
use App\Models\Postagem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovoComentarioPostagem extends Mailable
{
    use Queueable, SerializesModels;

    private $comentario;

    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME')),
            subject: 'Novo comentário registrado',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.email.novo-comentario-postagem',
            with: ['comentario' => $this->comentario],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
