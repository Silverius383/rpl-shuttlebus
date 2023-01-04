<!DOCTYPE html>
<html lang="en">
<head>

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

    <table class="order-details">
        <tbody>
        @foreach ($datas as $index => $value)
            <tr>
                <td>Order Id:</td>
                <td>{{ isset($value->created_at) ? $value->created_at->toDateString(): $value->booking_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Total Tiket</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datas as $index => $value)
            <tr>
                <td width="10%"><?php
$cars= json_decode($value->seats_booked);
echo count($cars);
?></td>
                <td width="15%" class="total-heading">Rp {{ json_encode($value->total_price) }}</td>
            </tr>
           @endforeach 
        </tbody>
        
    </table>
    <a href="{{ url('/home/booking')}}" class="button"> Back </a> 
        <br>
    <p class="text-center">
        Terimakasih
    </p>
    <a href="{{ url('/home/enquiry')}}" class="btn btn-secondary">
        </a>
    

</body>
</html>