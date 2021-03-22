<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top">
                <h2>PT. Enerren Technologies</h2>
            </td>
            <td align="right">
                <h2>{{ $invoices->created_at->format('D, d M Y') }}</h2>
                <pre>
                <b>Invoice: </b>{{ $invoices->invoice_number }}<br>
                <br>
                <b>Terms:</b> Due Upon Receipt <br>
                </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td><strong>From:</strong>
                <p>PT . ENERREN TECHNOLOGIES<br>
                    Gedung Graha Kapital Lt.1 Suite 101<br>
                    Jl. Kemang Raya No.4 <br>
                    Jakarta Selatan 12780 <br>
                    +62 21 7198634<br>
                    purchasing@enerren.com
                </p>
            </td>
            <td><strong>To:</strong>
                <p>{{ $invoices->customer->name }}<br>
                    {{ $invoices->customer->addressline1 }}<br>
                    {{ $invoices->customer->addressline2 }}<br>
                    {{ $invoices->customer->town }} , {{ $invoices->customer->zipcode }} <br>
                    {{ $invoices->customer->phone }} <br>
                    {{ $invoices->customer->email }}
                </p>
            </td>
        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Subtotal Product</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices->detail as $row)
            <tr>
                <td>{{ $row->product->name }}</td>
                <td>Rp {{ number_format($row->price_detail) }}</td>
                <td>{{ $row->qty }}</td>
                <td>Rp {{ $row->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Subtotal </td>
                <td align="right">Rp {{ number_format($invoices->total) }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Tax (10%)</td>
                <td align="right">Rp {{ number_format($invoices->tax) }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total </td>
                <td align="right" class="gray">Rp {{ number_format($invoices->total_price) }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>