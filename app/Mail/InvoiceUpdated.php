<?php

namespace App\Mail;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, Payment $payment)
    {
        $this->invoice = $invoice;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoice_updated')
                    ->subject('Your Invoice Payment')
                    ->with([
                        'invoice' => $this->invoice,
                        'payment' => $this->payment,
                    ]);
    }
}
