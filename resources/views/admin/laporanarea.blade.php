<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Total Transaksi Per Jenis Area</title>
    

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
        .button {
        background-color: #1c87c9;
        border-radius: 25px;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Cetak Transaksi per Jenis Area
                </th>
            </tr>
            <tr>
                <td class="no-border text-start heading" colspan="5">
                    Dalam Kota
                </td>
            </tr>
            <tr class="bg-blue">
                <th>Booking ID</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($book1 as $order)
            <tr>
                
                <td>{{$order->booking_id}}</td>
                <td>{{$order->total_price}}</td>
                
            </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <td class="no-border text-start heading" colspan="5">
                    Luar Kota
                </td>
            </tr>
            <tr class="bg-blue">
                <th>Booking ID</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($book2 as $order)
            <tr>
                
                <td>{{$order->booking_id}}</td>
                <td>Rp{{$order->total_price}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <div class="col-md-2">
        <a href="/admin" class="btn btn-sm btn-warning">Back</a>
    </div>
</body>
</html>