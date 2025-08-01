@if ($PreviewOrders->isEmpty())
    <div class="alert alert-info">
        No recent orders in the last 2 weeks.
    </div>
@else
    @foreach ($PreviewOrders as $order)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $order->created_at->format('Y-m-d') }}</strong> —
            Ref: <strong>{{ $order->reference_no }}</strong> —
            Status:
            <strong>
                @switch($order->sale_status)
                    @case(1)
                        {{ trans('file.Completed') }}
                    @break

                    @case(2)
                        {{ trans('file.Pending') }}
                    @break

                    @case(3)
                        {{ trans('file.Draft') }}
                    @break

                    @case(4)
                        {{ trans('file.Returned') }}
                    @break

                    @case(5)
                        {{ trans('file.Processing') }}
                    @break

                    @default
                        Unknown
                @endswitch
            </strong>
        </div>
    @endforeach

@endif
