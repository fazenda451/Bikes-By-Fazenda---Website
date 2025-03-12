<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $orderNumber;
    public $orderItems;
    public $customerName;
    public $pdfInvoice;

    /**
     * Create a new message instance.
     */
    public function __construct($orderNumber, $orderItems, $customerName)
    {
        $this->orderNumber = $orderNumber;
        $this->orderItems = $orderItems;
        $this->customerName = $customerName;
        
        // Gerar o PDF da fatura
        $this->pdfInvoice = Pdf::loadView('admin.invoice', [
            'orderItems' => $this->orderItems,
            'orderNumber' => $this->orderNumber
        ])->output();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Fatura do Pedido #' . $this->orderNumber . ' - BikesByFazenda',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->pdfInvoice, 'fatura-' . $this->orderNumber . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
