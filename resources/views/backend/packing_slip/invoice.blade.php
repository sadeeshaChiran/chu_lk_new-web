<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $general_setting->site_title }} | POS Bill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ url('logo', $general_setting->site_logo) }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <style>
@media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td,
            th {
                padding: 5px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 1.5cm 0.5cm 0.5cm;
            }

            @page: first {
                margin-top: 0.5cm;
            }

            /*tbody::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;
            }*/
        }

        /* body {
            width: 80mm;
            padding: 5mm;
            font-family: Arial, sans-serif;
            font-size: 8px;
        } */

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-bold {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 5px;
            font-size: 8px;
        }

        .line {
            border-bottom: 1px dashed #000;
            margin: 5px 0;
        }

        .barcode {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <img src="{{ url('logo', $general_setting->site_logo) }}" height="50">
        <h3>{{ $general_setting->site_title }}</h3>
        <p>{{ $sale->warehouse->phone }} | {{ $sale->warehouse->address }}</p>
    </div>
    <div class="line"></div>
    <p><strong>To:</strong><br>
        @if ($sale->is_online)
            {{ $sale->shipping_name }}<br>
            {{ $sale->shipping_phone }}<br>
            {{ $sale->shipping_address }}, {{ $sale->shipping_city }}
        @else
            {{ $sale->customer->name }}<br>
            {{ $sale->customer->phone_number }}<br>
            {{ $sale->customer->address }}, {{ $sale->customer->city }}
        @endif
    </p>
    <div class="line"></div>
    <table>
        <tr>
            <td>Invoice No:</td>
            <td class="text-right"><strong>{{ $sale->reference_no }}</strong></td>
        </tr>
        <tr>
            <td>Payment Status:</td>
            <td class="text-right text-bold">
                @if ($sale->payment_status == 1)
                    Pending
                @elseif($sale->payment_status == 2)
                    Due
                @elseif($sale->payment_status == 3)
                    Partial
                @elseif($sale->payment_status == 4)
                    Paid
                @endif
            </td>
        </tr>
        <tr>
            <td>COD:</td>
            <td class="text-right text-bold">BDT {{ $sale->grand_total - $sale->paid_amount }}</td>
        </tr>
        <tr>
            <td>Courier Name:</td>
            <td class="text-right text-bold">{{ $delivery_details->courier->name }}</td>

        </tr>

    </table>
    <tr>
        <div class="barcode">
            <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($packing_slip->waybill_id, 'C128') . '" width="300" alt="barcode">'; ?>
        </div>
    </tr>
    <div class="line"></div>
    <table>
        <tr>
            <th>Item</th>
            <th class="text-right">Qty</th>
            <th class="text-right">Total</th>
        </tr>
        @foreach ($packing_slip_product_data as $packing_slip_product)
            <?php
            $product = \App\Models\Product::find($packing_slip_product->product_id);
            $sale_product = \App\Models\Product_Sale::where('sale_id', $sale->id)->where('product_id', $packing_slip_product->product_id)->first();
            ?>
            <tr>
                <td>{{ $product->name }}</td>
                <td class="text-right">{{ $sale_product->qty }}</td>
                <td class="text-right">{{ $sale_product->total }}</td>
            </tr>
        @endforeach
    </table>
    <div class="line"></div>
    <div class="barcode">
        <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($sale->reference_no, 'C128') . '" width="200">'; ?>
    </div>
    <div class="text-center">
        <p>Thank you for your purchase!</p>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
        window.onafterprint = function() {
            window.location.href = "{{ route('sales.index', ['sale_status' => 2]) }}";
        };
    </script>
</body>

</html>
