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
        @page {
            size: 75mm 100mm;
            margin: 0;
        }

        @media print {
            * {
                font-size: 10px;
                line-height: 11px;
            }

            td,
            th {
                padding: 1mm 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 0.15cm 0.15cm 0.15cm;
            }

            @page: first {
                margin-top: 0.05cm;
            }

            /*tbody::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;
            }*/
        }

        p {
            font-size: 11.5px
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
            padding: 1px;
            font-size: 8.5px;
        }

        .line {
            border-bottom: 1px dashed #000;
            margin: 2px 0;
        }

        .barcode {
            margin-top: 0px;
            text-align: center;
        }

        .barcode img {
            max-width: 90%;
            height: auto;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="text-center">
        {{-- <img src="{{ url('logo', $general_setting->site_logo) }}" height="50"> --}}
        <span style="font-weight: bolder; font-size: 13px;">{{ $general_setting->site_title }}</span>
        <br />
        <span>{{ $sale->warehouse->phone }} | {{ $sale->warehouse->address }}</span>
        <br />

    </div>
    <div class="line"></div>
    <span style="font-size: 15px">
        <strong>To:</strong><br>
        @if ($sale->sale_type == 'website')
            {{ $sale->shipping_name }}<br>
            {{ $sale->shipping_phone }}
            @if ($sale->shipping_phone_2)
                / {{ $sale->shipping_phone_2 }}
            @endif
            <br>
            {{ $sale->shipping_address }}, {{ $sale->shipping_city }}
        @else
            {{ $sale->customer->name }}<br>
            {{ $sale->customer->phone_number }}
            @if ($sale->customer->phone_number_2)
                / {{ $sale->customer->phone_number_2 }}
            @endif
            <br>
            {{ $sale->customer->address }}, {{ $sale->customer->city }}
        @endif
    </span>
    <div class="line"></div>
    <table>
        {{-- <tr>
            <td>Invoice No:</td>
            <td class="text-right"><strong>{{ $sale->reference_no }}</strong></td>
        </tr> --}}
        {{-- <tr>
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
        </tr> --}}
        <div
            style="text-align: center; width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 6px; margin-bottom: 6px;">
            <span>COD:</span>
            <span class="text-right text-bold"
                style="margin-left: 5px; font-size: 15px;">Rs.{{ $sale->grand_total - $sale->paid_amount }}.00</span>
        </div>

        {{-- <tr>
            <td>Courier Name:</td>
            <td class="text-right text-bold">{{ $delivery_details->courier->name }}</td>

        </tr> --}}

    </table>
    <tr>
        <div class="barcode">
            <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($packing_slip->waybill_id, 'C128', 2, 50) . '" " alt="barcode">'; ?>
        </div>
    </tr>
    <div
        style="text-align: center; width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 3px; margin-bottom: 3px;">
        <span class="text-right text-bold"
            style="margin-left: 5px; font-size: 13px;">{{ $packing_slip->waybill_id }}</span>
    </div>
    <div class="line"></div>
    <table>
        <tr>
            <th>Item</th>
            <th class="text-right">Qty</th>
            {{-- <th class="text-right">Total</th> --}}
        </tr>
        @foreach ($packing_slip_product_data as $packing_slip_product)
            <?php
            $product = \App\Models\Product::find($packing_slip_product->product_id);
            $sale_product = \App\Models\Product_Sale::where('sale_id', $sale->id)->where('product_id', $packing_slip_product->product_id)->first();
            ?>
            <tr>
                <td>{{ $product->name }}</td>
                <td class="text-right">{{ $sale_product->qty }}</td>
                {{-- <td class="text-right">{{ $sale_product->total }}</td> --}}
            </tr>
        @endforeach
    </table>
    <div class="line"></div>

    {{-- <div class="text-center">
        <p>Thank you for your purchase!</p>
    </div> --}}
    <script>
        window.onload = function() {
            window.print();
        };

        function getDateStr(date) {
            return date.toISOString().split('T')[0]; // Format: YYYY-MM-DD
        }

        window.onafterprint = function() {
            const today = new Date();
            const priorDate = new Date();
            priorDate.setDate(today.getDate() - 30);

            const startingDate = getDateStr(priorDate);
            const endingDate = getDateStr(today);

            const url = "{{ route('sales.index') }}" +
                "?sale_status=2" +
                "&starting_date=" + encodeURIComponent(startingDate) +
                "&ending_date=" + encodeURIComponent(endingDate);

            window.location.href = url;
        };
    </script>
</body>

</html>
