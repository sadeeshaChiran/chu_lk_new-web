@extends('backend.layout.main')
@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header mt-2">
                    <h3 class="text-center">{{ trans('file.Brand Sales Report') }}</h3>
                </div>
                {!! Form::open(['route' => 'report.brandSales', 'method' => 'post']) !!}
                <div class="row mb-3 product-report-filter">
                    <div class="col-md-4 offset-md-2 mt-3">
                        <div class="form-group row">
                            <label class="d-tc mt-2"><strong>{{ trans('file.Choose Your Date') }}</strong></label>
                            <div class="d-tc">
                                <div class="input-group">
                                    <input type="text" class="daterangepicker-field form-control"
                                        value="{{ $start_date }} To {{ $end_date }}" required />
                                    <input type="hidden" name="start_date" value="{{ $start_date }}" />
                                    <input type="hidden" name="end_date" value="{{ $end_date }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="form-group row">
                            <label class="d-tc mt-2"><strong>{{ trans('file.Choose Warehouse') }}</strong></label>
                            <div class="d-tc">
                                <select name="warehouse_id" class="selectpicker form-control" data-live-search="true">
                                    <option value="0">{{ trans('file.All Warehouse') }}</option>
                                    @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}"
                                            {{ $warehouse_id == $warehouse->id ? 'selected' : '' }}>
                                            {{ $warehouse->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button class="btn btn-primary" type="submit">{{ trans('file.submit') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="table-responsive">
            <table id="brand-sales-table" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ trans('file.Brand') }}</th>
                        <th>Total Sales Amount</th>
                        <th>Total Qty Sold</th>
                        <th>Product Count</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('file.Total') }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(".daterangepicker-field").daterangepicker({
            timeZone: 'Asia/Colombo',
            callback: function(startDate, endDate, period) {
                var start_date = startDate.format('YYYY-MM-DD');
                var end_date = endDate.format('YYYY-MM-DD');
                $(this).val(start_date + ' To ' + end_date);
                $('input[name="start_date"]').val(start_date);
                $('input[name="end_date"]').val(end_date);
            }
        });

        $('#brand-sales-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('report.brandSales') }}",
                type: "POST",
                data: function(d) {
                    d.start_date = $('input[name=start_date]').val();
                    d.end_date = $('input[name=end_date]').val();
                    d.warehouse_id = $('select[name=warehouse_id]').val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [{
                    data: "brand_name"
                },
                {
                    data: "total_sales"
                },
                {
                    data: "total_qty"
                },
                {
                    data: "product_count"
                }
            ],
           dom: '<"row"lfB>rtip', // 👈 enables button placement
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();
                $(api.column(1).footer()).html(
                    api.column(1).data().reduce((a, b) => parseFloat(a) + parseFloat(b), 0).toFixed(2)
                );
                $(api.column(2).footer()).html(
                    api.column(2).data().reduce((a, b) => parseInt(a) + parseInt(b), 0)
                );
            }
        });
    </script>
@endpush
