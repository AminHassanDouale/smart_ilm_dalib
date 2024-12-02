<!DOCTYPE html>
<html>
<head>
    <title>Invoice Updated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            text-align: center;
        }
        .invoice-details {
            margin: 20px 0;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
        }
        .invoice-details th {
            background-color: #f4f4f4;
        }
        .invoice-details td {
            border-bottom: 1px solid #ddd;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_cHUiHA9c-3OWspexxDn-zj9G00iwXjttzGhM1ayHMdyNT6YB4S61UDVNq36PsrU6AX0&usqp=CAU" alt="Logo" class="h-4">
            <h1></h1>
        </div>
        <div class="invoice-details">
            <table width="100%">
                <tr>
                    <th>Invoice ID</th>
                    <td>#{{ $invoice->invoiceId }}</td>
                </tr>
                <tr>
                    <th>Student</th>
                    <td>{{ $invoice->student->name }}</td>
                </tr>
                <tr>
                    <th>Filiere</th>
                    <td>{{ $invoice->student->filiere->name }}</td>
                </tr>
                <tr>
                    <th>Niveau</th>
                    <td>{{ $invoice->student->niveau->name }}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{ $invoice->student->section->name }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $invoice->amount }} DJF</td>
                </tr>
                <tr>
                    <th>Total Paid</th>
                    <td>{{ $invoice->amount_paid }} DJF</td>
                </tr>
                <tr>
                    <th>Remaining</th>
                    <td>{{ $invoice->remaining }} DJF</td>
                </tr>
                <tr>
                    <th>Payment Option</th>
                    <td>{{ $payment->payment_type }}</td>
                </tr>
                <tr>
                    <th>Cashier</th>
                    <td>{{ $payment->user->name }}</td>
                </tr>
                <tr>
                    <th>Issued</th>
                    <td>{{ \Carbon\Carbon::parse($invoice->start_date)->format('l, F j, Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $invoice->status->name }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Thank you for your payment.</p>
        </div>
    </div>
</body>
</html>
