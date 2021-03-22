<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: 750px;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 740px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }
    </style>
</head>

<body>
    <div class="container">

        <table>
            <caption>
                INVOICE
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#{{ $invoices-> }}</strong></th>
                    <th>{{ $invoices->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>From: </h4>
                        <p>PT . ENERREN TECHNOLOGIES<br>
                            Gedung Graha Kapital Lt.1 Suite 101<br>
                            Jl. Kemang Raya No.4 <br>
                            Jakarta Selatan 12780 <br>
                            +62 21 7198634<br>
                            purchasing@enerren.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>To : </h4>
                        <p>{{ $invoices->customer->name }}<br>
                            {{ $invoices->customer->addressline1 }}<br>
                            {{ $invoices->customer->addressline2 }}<br>
                            {{ $invoices->customer->town }} , {{ $invoices->customer->zipcode }} <br>
                            {{ $invoices->customer->phone }} <br>
                            {{ $invoices->customer->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($invoices->detail as $row)
                <tr>
                    <td>{{ $row->product->name }}</td>
                    <td>Rp {{ number_format($row->price_detail) }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>Rp {{ $row->subtotal }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3">Subtotal</th>
                    <td>Rp {{ number_format($invoices->total) }}</td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td></td>
                    <td>10 %</td>
                    <td>Rp {{ number_format($invoices->tax) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp {{ number_format($invoices->total_price) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>