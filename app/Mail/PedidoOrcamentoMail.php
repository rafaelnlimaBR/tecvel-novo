<?php

namespace App\Mail;

use App\Models\Contrato;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoOrcamentoMail extends Mailable
{
    use Queueable, SerializesModels;
    private $contrato;
    private $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contrato $contrato,$pdf)
    {
        $this->subject  =   'Pedido de Orcamento';
        $this->contrato = $contrato;
        $this->pdf       =   $pdf;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(

            subject: 'Pedido de Orcamento',

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
            view: 'admin.email.pedido-orcamento',
            with: ['contrato' => $this->contrato],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath($this->pdf),
        ];
    }
}
