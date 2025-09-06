@extends('backend.layout.main')
@section('content')

    @if (session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
    @endif
    @php
        if ($general_setting->theme == 'default.css') {
            $color = '#733686';
            $color_rgba = 'rgba(115, 54, 134, 0.8)';
        } elseif ($general_setting->theme == 'green.css') {
            $color = '#2ecc71';
            $color_rgba = 'rgba(46, 204, 113, 0.8)';
        } elseif ($general_setting->theme == 'blue.css') {
            $color = '#3498db';
            $color_rgba = 'rgba(52, 152, 219, 0.8)';
        } elseif ($general_setting->theme == 'dark.css') {
            $color = '#34495e';
            $color_rgba = 'rgba(52, 73, 94, 0.8)';
        }
    @endphp
    <div class="row">

        <div class="container-fluid">
            @php
                $lims_warehouse_list = App\Models\Warehouse::where('is_active', true)->get();
            @endphp

            @if (
                !config('database.connections.saleprosaas_landlord') &&
                    \Auth::user()->role_id <= 2 &&
                    isset($_COOKIE['login_now']) &&
                    $_COOKIE['login_now']
            )
                <div id="update-alert-section"
                    class="{{ $alertVersionUpgradeEnable === true ? null : 'd-none' }} alert alert-primary alert-dismissible fade show"
                    role="alert">
                    <p id="announce" class="{{ $alertVersionUpgradeEnable === true ? null : 'd-none' }}"><strong>Hurray
                            !!!</strong> A new version {{ config('auto_update.VERSION') }} <span id="newVersionNo"></span>
                        has been released. Please <i><b><a href="{{ route('new-release') }}">Click here</a></b></i> to check
                        upgrade details.</p>
                    <button type="button" id="closeButtonUpgrade" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php setcookie('login_now', 0, time() + 86400 * 1, '/'); ?>
            @endif
            <div class="col-md-12">
                <div class="brand-text float-left mt-4">
                    <h3>{{ trans('file.welcome') }} <span>{{ Auth::user()->name }}</span></h3>
                </div>
                @php
                    $revenue_profit_summary = $role_has_permissions_list
                        ->where('name', 'revenue_profit_summary')
                        ->first();
                @endphp
                @if ($revenue_profit_summary || $hasSaleBiller)
                    <div class="filter-toggle btn-group d-inline-block">
                        @if (\Auth::user()->role_id <= 8)
                            <select name="warehouse_id" class="selectpicker" id="warehouse_btn" data-live-search="true"
                                data-live-search-style="begins">
                                <option value="0">{{ trans('file.All Warehouse') }}</option>
                                @foreach ($lims_warehouse_list as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        @endif

                        <div class="form-group">
                            <label><strong>{{ trans('file.Date') }}</strong></label>
                            <input type="text" id="daterange" class="form-control"
                                value="{{ date('Y' . '-' . date('m') . '-' . '01') . ' To ' . date('Y-m-d') }}" />
                        </div>


                        <button class="btn btn-default date-btn" data-start_date="{{ date('Y-m-d') }}"
                            data-end_date="{{ date('Y-m-d') }}">{{ trans('file.Today') }}</button>

                        <button class="btn btn-default date-btn" data-start_date="{{ date('Y-m-d', strtotime('-1 day')) }}"
                            data-end_date="{{ date('Y-m-d', strtotime('-1 day')) }}">{{ trans('Yesterday') }}</button>
                        <button class="btn btn-default date-btn"
                            data-start_date="{{ date('Y-m-d', strtotime(' -7 day')) }}"
                            data-end_date="{{ date('Y-m-d') }}">{{ trans('file.Last 7 Days') }}</button>
                        <button class="btn btn-default date-btn active"
                            data-start_date="{{ date('Y') . '-' . date('m') . '-' . '01' }}"
                            data-end_date="{{ date('Y-m-d') }}">{{ trans('file.This Month') }}</button>
                        <button class="btn btn-default date-btn"
                            data-start_date="{{ date('Y-m-01', strtotime('first day of last month')) }}"
                            data-end_date="{{ date('Y-m-t', strtotime('last day of last month')) }}">
                            {{ trans('Last Month') }}
                        </button>


                        @if (\Auth::user()->role_id <= 2)
                            <button class="btn btn-default date-btn" data-start_date="{{ date('Y') . '-01' . '-01' }}"
                                data-end_date="{{ date('Y') . '-12' . '-31' }}">{{ trans('file.This Year') }}</button>
                        @endif

                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Counts Section -->
    <section class="dashboard-counts">
        <div class="container-fluid">
            <div class="row">
                @if ($revenue_profit_summary)
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <!-- Count item widget-->
                            <div class="col-sm-3">
                                <div class="wrapper count-title">
                                    <div class="icon"><i class="dripicons-graph-bar" style="color: #733686"></i></div>
                                    <div>
                                        <div class="count-number revenue-data">
                                            {{ number_format((float) $revenue, $general_setting->decimal) }}</div>
                                        <div class="name"><strong
                                                style="color: #733686">{{ trans('file.revenue') }}</strong></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Count item widget-->
                            <div class="col-sm-3">
                                <div class="wrapper count-title">
                                    <div class="icon"><i class="dripicons-return" style="color: #ff8952"></i></div>
                                    <div>
                                        <div class="count-number return-data">
                                            {{ number_format((float) $return, $general_setting->decimal) }}</div>
                                        <div class="name"><strong
                                                style="color: #ff8952">{{ trans('file.Sale Return') }}</strong></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Count item widget-->
                            <div class="col-sm-3">
                                <div class="wrapper count-title">
                                    <div class="icon"><i class="dripicons-media-loop" style="color: #00c689"></i>
                                    </div>
                                    <div>
                                        <div class="count-number purchase_return-data">
                                            {{ number_format((float) $purchase_return, $general_setting->decimal) }}
                                        </div>
                                        <div class="name"><strong
                                                style="color: #00c689">{{ trans('file.Purchase Return') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Count item widget-->
                            <div class="col-sm-3">
                                <div class="wrapper count-title">
                                    <div class="icon"><i class="dripicons-trophy" style="color: #297ff9"></i></div>
                                    <div>
                                        <div class="count-number profit-data">
                                            {{ number_format((float) $profit, $general_setting->decimal) }}</div>
                                        <div class="name"><strong
                                                style="color: #297ff9">{{ trans('file.profit') }}</strong></div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                @endif

                @if ($revenue_profit_summary)
                    <div class="col-md-6">
                        <div class="card shadow p-2">
                            <div class="card-header d-flex align-items-center text-center">
                                <h4 class="col-12">POS Sales Summary</h4>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center align-items-end text-center p-2 "
                                style="font-size: 16px; font-weight: 500;">
                                <!-- ( -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Revenue -->
                                <div class="mx-2">
                                    <div style="color: #733686;">{{ trans('file.revenue') }}</div>
                                    <div class="pos-revenue">
                                        {{ number_format((float) $pos_revenue, $general_setting->decimal) }}</div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="pos-return">
                                        {{ number_format((float) $pos_return, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff3939;">{{ trans('file.Product Cost') }}</div>
                                    <div class="pos-product-cost">
                                        {{ number_format((float) $pos_product_cost, $general_setting->decimal) }}
                                    </div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="pos-returnPC">
                                        {{ number_format((float) $pos_returnPC, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- = -->
                                <div class="mx-2" style="font-size: 36px;">=</div>

                                <!-- Net Profit -->
                                <div class="mx-2">
                                    <div style="color: #297ff9;">{{ trans('file.Net Profit') }}</div>
                                    <div class="pos-net-profit">
                                        {{ number_format((float) $pos_net_profit, $general_setting->decimal) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow p-2">
                            <div class="card-header d-flex align-items-center text-center">
                                <h4 class="col-12">Online Sales Summary</h4>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center align-items-end text-center p-2 "
                                style="font-size: 16px; font-weight: 500;">
                                <!-- ( -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Revenue -->
                                <div class="mx-2">
                                    <div style="color: #733686;">{{ trans('file.revenue') }}</div>
                                    <div class="online-revenue">
                                        {{ number_format((float) $online_revenue, $general_setting->decimal) }}</div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="online-return">
                                        {{ number_format((float) $online_return, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff3939;">{{ trans('file.Product Cost') }}</div>
                                    <div class="online-product-cost">
                                        {{ number_format((float) $online_product_cost, $general_setting->decimal) }}
                                    </div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="online-returnPC">
                                        {{ number_format((float) $online_returnPC, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- = -->
                                <div class="mx-2" style="font-size: 36px;">=</div>

                                <!-- Net Profit -->
                                <div class="mx-2">
                                    <div style="color: #297ff9;">{{ trans('file.Net Profit') }}</div>
                                    <div class="online-net-profit">
                                        {{ number_format((float) $online_net_profit, $general_setting->decimal) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card shadow p-2">
                            <div class="card-header d-flex align-items-center text-center">
                                <h4 class="col-12">Website Sales Summary</h4>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center align-items-end text-center p-2 "
                                style="font-size: 16px; font-weight: 500;">
                                <!-- ( -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Revenue -->
                                <div class="mx-2">
                                    <div style="color: #733686;">{{ trans('file.revenue') }}</div>
                                    <div class="website-revenue">
                                        {{ number_format((float) $website_revenue, $general_setting->decimal) }}</div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="website-return">
                                        {{ number_format((float) $website_return, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff3939;">{{ trans('file.Product Cost') }}</div>
                                    <div class="website-product-cost">
                                        {{ number_format((float) $website_product_cost, $general_setting->decimal) }}
                                    </div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="website-returnPC">
                                        {{ number_format((float) $website_returnPC, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- = -->
                                <div class="mx-2" style="font-size: 36px;">=</div>

                                <!-- Net Profit -->
                                <div class="mx-2">
                                    <div style="color: #297ff9;">{{ trans('file.Net Profit') }}</div>
                                    <div class="website-net-profit">
                                        {{ number_format((float) $website_net_profit, $general_setting->decimal) }}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card shadow p-2">
                            <div class="card-header d-flex align-items-center text-center">
                                <h4 class="col-12">Wholesale Sales Summary</h4>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center align-items-end text-center p-2 "
                                style="font-size: 16px; font-weight: 500;">
                                <!-- ( -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Revenue -->
                                <div class="mx-2">
                                    <div style="color: #733686;">{{ trans('file.revenue') }}</div>
                                    <div class="wholesale-revenue">
                                        {{ number_format((float) $wholesale_revenue, $general_setting->decimal) }}</div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="wholesale-return">
                                        {{ number_format((float) $wholesale_return, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <!-- Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff3939;">{{ trans('file.Product Cost') }}</div>
                                    <div class="wholesale-product-cost">
                                        {{ number_format((float) $wholesale_product_cost, $general_setting->decimal) }}
                                    </div>
                                </div>

                                <!-- − -->
                                <div class="mx-2" style="font-size: 36px;">−</div>

                                <!-- Sale Return Product Cost -->
                                <div class="mx-2">
                                    <div style="color: #ff8952;">{{ trans('file.Sale Return') }}</div>
                                    <div class="wholesale-returnPC">
                                        {{ number_format((float) $wholesale_returnPC, $general_setting->decimal) }}</div>
                                </div>

                                <!-- ) -->
                                <div class="mx-2" style="font-size: 36px;">)</div>

                                <!-- = -->
                                <div class="mx-2" style="font-size: 36px;">=</div>

                                <!-- Net Profit -->
                                <div class="mx-2">
                                    <div style="color: #297ff9;">{{ trans('file.Net Profit') }}</div>
                                    <div class="wholesale-net-profit">
                                        {{ number_format((float) $wholesale_net_profit, $general_setting->decimal) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shadow p-2">
                            <div class="card-header d-flex align-items-center text-center">
                                <h4 class="col-12">Profit Summary</h4>
                            </div>

                            <div class="d-flex flex-wrap justify-content-center align-items-end text-center p-2 "
                                style="font-size: 16px; font-weight: 500;">

                                <div class="mx-2" style="font-size: 36px;">(</div>

                                <div class="mx-2">
                                    <div style="color: #297ff9;">POS Sale {{ trans('file.Net Profit') }}</div>
                                    <div class="pos-net-profit">
                                        {{ number_format((float) $pos_net_profit, $general_setting->decimal) }}</div>
                                </div>
                                <div class="mx-2" style="font-size: 36px;">+</div>
                                <div class="mx-2">
                                    <div style="color: #297ff9;">Online Sales {{ trans('file.Net Profit') }}</div>
                                    <div class="online-net-profit">
                                        {{ number_format((float) $online_net_profit, $general_setting->decimal) }}</div>
                                </div>
                                <div class="mx-2" style="font-size: 36px;">+</div>
                                <div class="mx-2">
                                    <div style="color: #297ff9;">Website Sales {{ trans('file.Net Profit') }}</div>
                                    <div class="website-net-profit">
                                        {{ number_format((float) $website_net_profit, $general_setting->decimal) }}</div>
                                </div>
                                <div class="mx-2" style="font-size: 36px;">+</div>
                                <div class="mx-2">
                                    <div style="color: #297ff9;">Wholesale Sales {{ trans('file.Net Profit') }}</div>
                                    <div class="wholesale-net-profit">
                                        {{ number_format((float) $wholesale_net_profit, $general_setting->decimal) }}</div>
                                </div>

                                <div class="mx-2" style="font-size: 36px;">)</div>
                                <div class="mx-2" style="font-size: 36px;">+</div>
                                <div class="mx-2">
                                    <div style="color: #158a0b;">{{ trans('file.Income') }}</div>
                                    <div class="income">{{ number_format((float) $income, $general_setting->decimal) }}
                                    </div>
                                </div>
                                <div class="mx-2" style="font-size: 36px;">-</div>
                                <div class="mx-2">
                                    <div style="color: #a22626;">{{ trans('file.Expense') }}</div>
                                    <div class="expense">{{ number_format((float) $expense, $general_setting->decimal) }}
                                    </div>
                                </div>

                                <div class="mx-2" style="font-size: 36px;">=</div>
                                <div class="mx-2">
                                    <div style="color: #48bfff;">{{ trans('file.Profit') }}</div>
                                    <div class="summary-profit">
                                        {{ number_format((float) ($pos_net_profit + $online_net_profit + $website_net_profit + $wholesale_net_profit + $income - $expense), $general_setting->decimal) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div id="biller-summary-table" class="col-12">
                    @if ($hasSaleBiller)
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header text-center">
                                    <h4 class="mb-0">Billers Sales Summary</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Biller</th>
                                                <th>Sales Count</th>
                                                <th>Sales Value</th>
                                                <th>Return Value</th>
                                                <th>Net Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (['POS', 'Online', 'Wholesale', 'Website'] as $type)
                                                @php $sales = $saleBillerSummary[$type]; @endphp

                                                @if (count($sales) > 0)
                                                    <tr class="table-primary">
                                                        <td colspan="5" class="text-start font-weight-bold">
                                                            {{ $type }} Sales
                                                        </td>
                                                    </tr>

                                                    @foreach ($sales as $sale)
                                                        <tr>
                                                            <td>{{ $sale->biller_name }}</td>
                                                            <td>{{ $sale->sale_count }}</td>
                                                            <td style="color: #733686;">
                                                                {{ number_format($sale->sales_value, $general_setting->decimal) }}
                                                            </td>
                                                            <td style="color: #ff8952;">
                                                                {{ number_format($sale->return_value, $general_setting->decimal) }}
                                                            </td>
                                                            <td style="color: #297ff9;">
                                                                {{ number_format($sale->net_sales, $general_setting->decimal) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


                @php
                    $cash_flow = $role_has_permissions_list->where('name', 'cash_flow')->first();
                @endphp
                @if ($cash_flow)
                    <div class="col-md-7 mt-4">
                        <div class="card line-chart-example">
                            <div class="card-header d-flex align-items-center">
                                <h4>{{ trans('file.Cash Flow') }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="cashFlow" data-color = "{{ $color }}"
                                    data-color_rgba = "{{ $color_rgba }}"
                                    data-recieved = "{{ json_encode($payment_recieved) }}"
                                    data-sent = "{{ json_encode($payment_sent) }}"
                                    data-month = "{{ json_encode($month) }}"
                                    data-label1="{{ trans('file.Payment Recieved') }}"
                                    data-label2="{{ trans('file.Payment Sent') }}"></canvas>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    $monthly_summary = $role_has_permissions_list->where('name', 'monthly_summary')->first();
                @endphp
                @if ($monthly_summary)
                    <div class="col-md-5 mt-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>{{ date('F') }} {{ date('Y') }}</h4>
                            </div>
                            <div class="pie-chart mb-2">
                                <canvas id="transactionChart" data-color = "{{ $color }}"
                                    data-color_rgba = "{{ $color_rgba }}" data-revenue={{ $revenue }}
                                    data-purchase={{ $purchase }} data-expense={{ $expense }}
                                    data-label1="{{ trans('file.Purchase') }}"
                                    data-label2="{{ trans('file.revenue') }}"
                                    data-label3="{{ trans('file.Expense') }}" width="100" height="95"> </canvas>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                @php
                    $yearly_report = $role_has_permissions_list->where('name', 'yearly_report')->first();
                @endphp
                @if ($yearly_report)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>{{ trans('file.yearly report') }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="saleChart" data-sale_chart_value = "{{ json_encode($yearly_sale_amount) }}"
                                    data-purchase_chart_value = "{{ json_encode($yearly_purchase_amount) }}"
                                    data-label1="{{ trans('file.Purchased Amount') }}"
                                    data-label2="{{ trans('file.Sold Amount') }}"></canvas>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ trans('file.Recent Transaction') }}</h4>
                            <div class="right-column">
                                <div class="badge badge-primary">{{ trans('file.latest') }} 5</div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#sale-latest" role="tab"
                                    data-toggle="tab">{{ trans('file.Sale') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#purchase-latest" role="tab"
                                    data-toggle="tab">{{ trans('file.Purchase') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#quotation-latest" role="tab"
                                    data-toggle="tab">{{ trans('file.Quotation') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#payment-latest" role="tab"
                                    data-toggle="tab">{{ trans('file.Payment') }}</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="sale-latest">
                                <div class="table-responsive">
                                    <table id="recent-sale" class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('file.date') }}</th>
                                                <th>{{ trans('file.reference') }}</th>
                                                <th>{{ trans('file.customer') }}</th>
                                                <th>{{ trans('file.status') }}</th>
                                                <th>{{ trans('file.grand total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="purchase-latest">
                                <div class="table-responsive">
                                    <table id="recent-purchase" class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('file.date') }}</th>
                                                <th>{{ trans('file.reference') }}</th>
                                                <th>{{ trans('file.Supplier') }}</th>
                                                <th>{{ trans('file.status') }}</th>
                                                <th>{{ trans('file.grand total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
                                <div class="table-responsive">
                                    <table id="recent-quotation" class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('file.date') }}</th>
                                                <th>{{ trans('file.reference') }}</th>
                                                <th>{{ trans('file.customer') }}</th>
                                                <th>{{ trans('file.status') }}</th>
                                                <th>{{ trans('file.grand total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="payment-latest">
                                <div class="table-responsive">
                                    <table id="recent-payment" class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('file.date') }}</th>
                                                <th>{{ trans('file.reference') }}</th>
                                                <th>{{ trans('file.Amount') }}</th>
                                                <th>{{ trans('file.Paid By') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ trans('file.Best Seller') . ' ' . date('F') }}</h4>
                            <div class="right-column">
                                <div class="badge badge-primary">{{ trans('file.top') }} 5</div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="monthly-best-selling-qty" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ trans('file.Product Details') }}</th>
                                        <th>{{ trans('file.qty') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ trans('file.Best Seller') . ' ' . date('Y') . '(' . trans('file.qty') . ')' }}</h4>
                            <div class="right-column">
                                <div class="badge badge-primary">{{ trans('file.top') }} 5</div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="yearly-best-selling-qty" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ trans('file.Product Details') }}</th>
                                        <th>{{ trans('file.qty') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ trans('file.Best Seller') . ' ' . date('Y') . '(' . trans('file.price') . ')' }}</h4>
                            <div class="right-column">
                                <div class="badge badge-primary">{{ trans('file.top') }} 5</div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="yearly-best-selling-price" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ trans('file.Product Details') }}</th>
                                        <th>{{ trans('file.grand total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script type="text/javascript">
        $('#daterange').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: moment().startOf('month'), // optional default range
            endDate: moment() // optional default range
        }, function(start, end) {
            $(".date-btn").removeClass("active"); // Unselect buttons

            var start_date = start.format('YYYY-MM-DD');
            var end_date = end.format('YYYY-MM-DD');
            var warehouse_id = $("#warehouse_btn").val();

            $('#daterange').val(start_date + ' To ' + end_date);

            $.get("dashboard-filter/" + start_date + "/" + end_date + "/" + warehouse_id, function(data) {
                dashboardFilter(data);
            });
        });


        $.ajax({
            url: '{{ url('/yearly-best-selling-price') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var url = '{{ url('/images/product') }}';
                data.forEach(function(item) {
                    if (item.product_images)
                        var images = item.product_images.split(',');
                    else
                        var images = ['zummXD2dvAtI.png'];
                    $('#yearly-best-selling-price').find('tbody').append(
                        '<tr><td><img src="' + url + '/' + images[0] +
                        '" height="25" width="30"> ' + item.product_name + ' [' + item
                        .product_code + ']</td><td>' + item.total_price + '</td></tr>');
                })
            }
        });


        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/yearly-best-selling-qty') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var url = '{{ url('/images/product') }}';
                    data.forEach(function(item) {
                        if (item.product_images)
                            var images = item.product_images.split(',');
                        else
                            var images = ['zummXD2dvAtI.png'];
                        $('#yearly-best-selling-qty').find('tbody').append(
                            '<tr><td><img src="' + url + '/' + images[0] +
                            '" height="25" width="30"> ' + item.product_name + ' [' + item
                            .product_code + ']</td><td>' + item.sold_qty + '</td></tr>');
                    })
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/monthly-best-selling-qty') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var url = '{{ url('/images/product') }}';
                    data.forEach(function(item) {
                        if (item.product_images)
                            var images = item.product_images.split(',');
                        else
                            var images = ['zummXD2dvAtI.png'];
                        $('#monthly-best-selling-qty').find('tbody').append(
                            '<tr><td><img src="' + url + '/' + images[0] +
                            '" height="25" width="30"> ' + item.product_name + ' [' + item
                            .product_code + ']</td><td>' + item.sold_qty + '</td></tr>');
                    })
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/recent-sale') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(item) {
                        var sale_date = dateFormat(item.created_at.split('T')[0],
                            '{{ $general_setting->date_format }}')
                        if (item.sale_status == 1) {
                            var status =
                                '<div class="badge badge-success">{{ trans('file.Completed') }}</div>';
                        } else if (item.sale_status == 2) {
                            var status =
                                '<div class="badge badge-danger">{{ trans('file.Pending') }}</div>';
                        } else {
                            var status =
                                '<div class="badge badge-warning">{{ trans('file.Draft') }}</div>';
                        }
                        $('#recent-sale').find('tbody').append('<tr><td>' + sale_date +
                            '</td><td>' + item.reference_no + '</td><td>' + item.name +
                            '</td><td>' + status + '</td><td>' + item.grand_total.toString()
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td></tr>');
                    })
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/recent-purchase') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(item) {
                        var payment_date = dateFormat(item.created_at.split('T')[0],
                            '{{ $general_setting->date_format }}')
                        if (item.status == 1) {
                            var status =
                                '<div class="badge badge-success">{{ trans('file.Recieved') }}</div>';
                        } else if (item.status == 2) {
                            var status =
                                '<div class="badge badge-danger">{{ trans('file.Partial') }}</div>';
                        } else if (item.status == 3) {
                            var status =
                                '<div class="badge badge-danger">{{ trans('file.Pending') }}</div>';
                        } else {
                            var status =
                                '<div class="badge badge-warning">{{ trans('file.Ordered') }}</div>';
                        }
                        $('#recent-purchase').find('tbody').append('<tr><td>' + payment_date +
                            '</td><td>' + item.reference_no + '</td><td>' + item.name +
                            '</td><td>' + status + '</td><td>' + item.grand_total.toString()
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td></tr>');
                    })
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/recent-quotation') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(item) {
                        var quotation_date = dateFormat(item.created_at.split('T')[0],
                            '{{ $general_setting->date_format }}')
                        if (item.quotation_status == 1) {
                            var status =
                                '<div class="badge badge-success">{{ trans('file.Pending') }}</div>';
                        } else if (item.quotation_status == 2) {
                            var status =
                                '<div class="badge badge-danger">{{ trans('file.Sent') }}</div>';
                        }
                        $('#recent-quotation').find('tbody').append('<tr><td>' +
                            quotation_date + '</td><td>' + item.reference_no + '</td><td>' +
                            item.name + '</td><td>' + status + '</td><td>' + item
                            .grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                            '</td></tr>');
                    })
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/recent-payment') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(item) {
                        var payment_date = dateFormat(item.created_at.split('T')[0],
                            '{{ $general_setting->date_format }}')
                        $('#recent-payment').find('tbody').append('<tr><td>' + payment_date +
                            '</td><td>' + item.payment_reference + '</td><td>' + item.amount
                            .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                            '</td><td>' + item.paying_method + '</td></tr>');
                    })
                }
            });
        });

        function dateFormat(inputDate, format) {
            const date = new Date(inputDate);
            //extract the parts of the date
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            //replace the month
            format = format.replace("m", month.toString().padStart(2, "0"));
            //replace the year
            format = format.replace("Y", year.toString());
            //replace the day
            format = format.replace("d", day.toString().padStart(2, "0"));
            return format;
        }


        $(document).ready(function() {
            $.ajax({
                url: '{{ url('/') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#userShowModal').modal('show');
                    $('#user-id').text(data.id);
                    $('#user-name').text(data.name);
                    $('#user-email').text(data.email);
                }
            });
        })
        // Show and hide color-switcher
        $(".color-switcher .switcher-button").on('click', function() {
            $(".color-switcher").toggleClass("show-color-switcher", "hide-color-switcher", 300);
        });

        // Color Skins
        $('a.color').on('click', function() {
            /*var title = $(this).attr('title');
            $('#style-colors').attr('href', 'css/skin-' + title + '.css');
            return false;*/
            $.get('setting/general_setting/change-theme/' + $(this).data('color'), function(data) {});
            var style_link = $('#custom-style').attr('href').replace(/([^-]*)$/, $(this).data('color'));
            $('#custom-style').attr('href', style_link);
        });

        $(".date-btn").on("click", function() {
            $(".date-btn").removeClass("active");
            $(this).addClass("active");
            var start_date = $(this).data('start_date');
            var end_date = $(this).data('end_date');
            var warehouse_id = $("#warehouse_btn").val();
            $('#daterange').val(start_date + ' To ' + end_date);

            $.get('dashboard-filter/' + start_date + '/' + end_date + '/' + warehouse_id, function(data) {
                dashboardFilter(data);
            });
        });

        $("#warehouse_btn").on("change", function() {
            var warehouse_id = $(this).val();
            var start_date = $('.date-btn.active').data('start_date');
            var end_date = $('.date-btn.active').data('end_date');
            //console.log(start_date);
            //console.log(end_date);
            $.get('dashboard-filter/' + start_date + '/' + end_date + '/' + warehouse_id, function(data) {
                dashboardFilter(data);
            });
        });

        function dashboardFilter(data) {

            $('.revenue-data').hide();
            $('.revenue-data').html(parseFloat(data[0]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.revenue-data').show(500);

            $('.return-data').hide();
            $('.return-data').html(parseFloat(data[1]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.return-data').show(500);

            $('.profit-data').hide();
            $('.profit-data').html(parseFloat(data[2]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.profit-data').show(500);

            $('.purchase_return-data').hide();
            $('.purchase_return-data').html(parseFloat(data[3]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.purchase_return-data').show(500);


            $('.pos-revenue').hide();
            $('.pos-revenue').html(parseFloat(data[19]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.pos-revenue').show(500);

            $('.pos-return').hide();
            $('.pos-return').html(parseFloat(data[20]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.pos-return').show(500);

            $('.pos-returnPC').hide();
            $('.pos-returnPC').html(parseFloat(data[29]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.pos-returnPC').show(500);

            $('.pos-product-cost').hide();
            $('.pos-product-cost').html(parseFloat(data[22]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.pos-product-cost').show(500);

            $('.pos-net-profit').hide();
            $('.pos-net-profit').html(parseFloat(data[21]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.pos-net-profit').show(500);



            $('.online-revenue').hide();
            $('.online-revenue').html(parseFloat(data[7]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.online-revenue').show(500);

            $('.online-return').hide();
            $('.online-return').html(parseFloat(data[8]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.online-return').show(500);
            console.log('222',data, data[8]);

            $('.online-returnPC').hide();
            $('.online-returnPC').html(parseFloat(data[26]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.online-returnPC').show(500);


            $('.online-product-cost').hide();
            $('.online-product-cost').html(parseFloat(data[10]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.online-product-cost').show(500);

            $('.online-net-profit').hide();
            $('.online-net-profit').html(parseFloat(data[9]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.online-net-profit').show(500);



            $('.wholesale-revenue').hide();
            $('.wholesale-revenue').html(parseFloat(data[15]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.wholesale-revenue').show(500);

            $('.wholesale-return').hide();
            $('.wholesale-return').html(parseFloat(data[16]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.wholesale-return').show(500);

            $('.wholesale-returnPC').hide();
            $('.wholesale-returnPC').html(parseFloat(data[28]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.wholesale-returnPC').show(500);

            $('.wholesale-product-cost').hide();
            $('.wholesale-product-cost').html(parseFloat(data[18]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.wholesale-product-cost').show(500);

            $('.wholesale-net-profit').hide();
            $('.wholesale-net-profit').html(parseFloat(data[17]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.wholesale-net-profit').show(500);



            $('.website-revenue').hide();
            $('.website-revenue').html(parseFloat(data[11]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.website-revenue').show(500);

            $('.website-return').hide();
            $('.website-return').html(parseFloat(data[12]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.website-return').show(500);
            $('.website-returnPC').hide();
            $('.website-returnPC').html(parseFloat(data[27]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.website-returnPC').show(500);

            $('.website-product-cost').hide();
            $('.website-product-cost').html(parseFloat(data[14]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.website-product-cost').show(500);

            $('.website-net-profit').hide();
            $('.website-net-profit').html(parseFloat(data[13]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.website-net-profit').show(500);


            $('.income').hide();
            $('.income').html(parseFloat(data[5]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.income').show(500);


            $('.expense').hide();
            $('.expense').html(parseFloat(data[4]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.expense').show(500);

            $('.summary-profit').hide();
            $('.summary-profit').html(parseFloat((data[9] + data[13] + data[17] + data[21]) + data[5] - data[4]).toLocaleString('en-US', {
                minimumFractionDigits: {{ $general_setting->decimal }},
                maximumFractionDigits: {{ $general_setting->decimal }}
            }));
            $('.summary-profit').show(500);




            const container = $('#biller-summary-table');
            container.empty();

            const hasSaleBiller = data[24];
            const saleBillerSummary = data[23];
            const decimal = 2; // Or get it dynamically from your config

            let html = '';

            if (hasSaleBiller) {
                html += `
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header text-center">
                                <h4 class="mb-0">Billers Sales Summary</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Biller</th>
                                            <th>Sales Count</th>
                                            <th>Sales Value</th>
                                            <th>Return Value</th>
                                            <th>Net Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        `;

                ['POS', 'Online', 'Wholesale', 'Website'].forEach(type => {
                    const sales = saleBillerSummary[type];
                    if (sales.length > 0) {
                        html += `
                            <tr class="table-primary">
                                <td colspan="5" class="text-start font-weight-bold">${type} Sales</td>
                            </tr>
                        `;
                        sales.forEach(sale => {
                            html += `
                                <tr>
                                    <td>${sale.biller_name}</td>
                                    <td>${sale.sale_count}</td>
                                    <td style="color: #733686;">${parseFloat(sale.sales_value).toFixed(decimal)}</td>
                                    <td style="color: #ff8952;">${parseFloat(sale.return_value).toFixed(decimal)}</td>
                                    <td style="color: #297ff9;">${parseFloat(sale.net_sales).toFixed(decimal)}</td>
                                </tr>
                            `;
                        });
                    }
                });

                html += `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                `;
            }

            container.append(html)

        }
    </script>
@endpush
