<?php

namespace App\Traits;

use App\Models\Invoice;

trait HandleInvoicePaymentsTrait
{
    public function handlePayment($invoiceId, $paymentAmount)
    {
        $remainingPayment = $paymentAmount;
        $currentInvoice = Invoice::find($invoiceId);

        while ($remainingPayment > 0 && $currentInvoice) {
            $dueAmount = $currentInvoice->amount - $currentInvoice->amount_paid;
            if ($remainingPayment >= $dueAmount) {
                $currentInvoice->amount_paid += $dueAmount;
                $remainingPayment -= $dueAmount;
            } else {
                $currentInvoice->amount_paid += $remainingPayment;
                $remainingPayment = 0;
            }
            $currentInvoice->remaining = max(0, $currentInvoice->amount - $currentInvoice->amount_paid);
            $currentInvoice->save();

            $currentInvoice = Invoice::where('id', '>', $currentInvoice->id)
                                     ->where('student_id', $currentInvoice->student_id)
                                     ->orderBy('id')
                                     ->first();
        }
    }
}
