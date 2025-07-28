<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Returns;
use App\Models\ReturnPurchase;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Payroll;
use App\Models\Quotation;
use App\Models\Payment;
use App\Models\Account;
use App\Models\Product_Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\RewardPointSetting;
use App\Models\Product_Warehouse;
use App\Models\Unit;
use Cache;
use DB;
use Auth;
use DateTime;
use Printing;
use Rawilk\Printing\Contracts\Printer;
use Spatie\Permission\Models\Role;
/*use vendor\autoload;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;*/

class HomeController extends Controller
{
    use \App\Traits\AutoUpdateTrait;

    public function home()
    {
        return view('backend.home');
    }

    public function index()
    {
        return redirect('dashboard');
    }

    public function documentation()
    {
        $general_setting =  Cache::remember('general_setting', 60 * 60 * 24 * 365, function () {
            return DB::table('general_settings')->latest()->first();
        });
        return view('backend.documentation', compact('general_setting'));
    }

    public function ecomDocumentation()
    {
        $general_setting =  Cache::remember('general_setting', 60 * 60 * 24 * 365, function () {
            return DB::table('general_settings')->latest()->first();
        });
        return view('backend.ecom-documentation', compact('general_setting'));
    }

    public function landlordDocumentation()
    {
        $general_setting =  Cache::remember('general_setting', 60 * 60 * 24 * 365, function () {
            return DB::table('general_settings')->latest()->first();
        });
        return view('landlord.documentation', compact('general_setting'));
    }

    public function addonList()
    {
        return view('backend.addonlist');
    }

    public function dashboard()
    {
        //return \Auth::user()->unreadNotifications->where('data.reminder_date', date('Y-m-d'));
        //making strict mode false for this query
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();
        if (Auth::user()->role_id == 10) {
            $customer = Customer::select('id', 'points')->where('user_id', Auth::id())->first();
            $lims_sale_data = Sale::with('warehouse')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();
            $lims_payment_data = DB::table('payments')
                ->join('sales', 'payments.sale_id', '=', 'sales.id')
                ->where('customer_id', $customer->id)
                ->select('payments.*', 'sales.reference_no as sale_reference')
                ->orderBy('payments.created_at', 'desc')
                ->get();
            $lims_quotation_data = Quotation::with('biller', 'customer', 'supplier', 'user')->orderBy('id', 'desc')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();

            $lims_return_data = Returns::with('warehouse', 'customer', 'biller')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();
            $lims_reward_point_setting_data = RewardPointSetting::select('per_point_amount')->latest()->first();
            return view('backend.customer_index', compact('customer', 'lims_sale_data', 'lims_payment_data', 'lims_quotation_data', 'lims_return_data', 'lims_reward_point_setting_data'));
        }

        $start_date = date("Y") . '-' . date("m") . '-' . '01';
        $end_date = date("Y") . '-' . date("m") . '-' . date('t', mktime(0, 0, 0, date("m"), 1, date("Y")));

        $yearly_sale_amount = [];

        if (Auth::user()->role_id <= 2) {
            // online billers sales
            $online_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->groupBy('billers.id', 'billers.name')
                ->get();
            // online billers returns
            $online_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'online')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // pos billers sales
            $pos_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // pos billers returns
            $pos_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'pos')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // warehouse billers sales
            $wholesale_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // wholesale billers returns
            $wholesale_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'wholesale')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // website billers sales
            $website_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // website billers returns
            $website_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'website')
                ->groupBy('billers.id', 'billers.name')
                ->get();
        } else {
            // online billers sales
            $online_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', value: $start_date)
                ->whereDate('sales.created_at',  '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->where('sales.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // online billers returns
            $online_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'online')
                ->where('returns.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // pos billers sales
            $pos_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->where('sales.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // pos billers returns
            $pos_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'pos')
                ->where('returns.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // wholesale billers sales
            $wholesale_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->where('sales.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // wholesale billers returns
            $wholesale_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'wholesale')
                ->where('returns.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // website billers sales
            $website_biller_sales = DB::table('sales')
                ->join('billers', 'sales.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(sales.grand_total) as sales_value'),
                    DB::raw('COUNT(sales.id) as sale_count')
                )
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->where('sales.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();

            // website billers returns
            $website_biller_returns = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->join('billers', 'returns.biller_id', '=', 'billers.id')
                ->select(
                    'billers.id as biller_id',
                    'billers.name as biller_name',
                    DB::raw('SUM(returns.grand_total) as return_value'),
                    DB::raw('COUNT(returns.id) as return_count')
                )
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->where('sales.sale_type', 'website')
                ->where('returns.biller_id', Auth::user()->biller_id)
                ->groupBy('billers.id', 'billers.name')
                ->get();
        }
        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            $product_sale_data = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $product_cost = $this->calculateAverageCOGS($product_sale_data);
            $revenue = Sale::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->where('sale_status', 1)->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
            // $return = Returns::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $expense = Expense::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('amount');
            $income = Income::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('amount');
            $purchase = Purchase::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $revenue = $revenue - $return + $income;
            // $profit = $revenue + $purchase_return - $product_cost - $expense;
            $profit = $revenue - $product_cost - $expense;





            // Online sale
            $online_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $online_product_cost = $this->calculateAverageCOGS($online_sale);
            $online_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'online')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $online_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'online')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $online_net_profit = $online_revenue - $online_return - $online_product_cost;

            // website sale
            $website_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $website_product_cost = $this->calculateAverageCOGS($website_sale);
            $website_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'website')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $website_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');

            $website_net_profit = $website_revenue - $website_return - $website_product_cost;

            // Wholesale sale
            $wholesale_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $wholesale_product_cost = $this->calculateAverageCOGS($wholesale_sale);
            $wholesale_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'wholesale')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $wholesale_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $wholesale_net_profit = $wholesale_revenue - $wholesale_return - $wholesale_product_cost;

            // pos sale
            $pos_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $pos_product_cost = $this->calculateAverageCOGS($pos_sale);
            $pos_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'pos')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $pos_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'pos')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $pos_net_profit = $pos_revenue - $pos_return - $pos_product_cost;
        } else {
            $product_sale_data = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $product_cost = $this->calculateAverageCOGS($product_sale_data);
            $revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sale_status', 1)->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));

            $expense = Expense::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
            $income = Income::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
            // $return = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $purchase = Purchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $revenue = $revenue - $return + $income;
            // $profit = $revenue + $purchase_return - $product_cost - $expense;
            $profit = $revenue - $product_cost - $expense;




            // Online sale
            $online_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $online_product_cost = $this->calculateAverageCOGS($online_sale);
            $online_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('sale_status', 1)
                ->where('sale_type', 'online')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $online_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.sale_type', 'online')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $online_net_profit = $online_revenue - $online_return - $online_product_cost;

            // website sale
            $website_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $website_product_cost = $this->calculateAverageCOGS($website_sale);
            $website_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('sale_status', 1)
                ->where('sale_type', 'website')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $website_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->sum('returns.grand_total');

            $website_net_profit = $website_revenue - $website_return - $website_product_cost;

            // Wholesale sale
            $wholesale_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $wholesale_product_cost = $this->calculateAverageCOGS($wholesale_sale);
            $wholesale_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('sale_status', 1)
                ->where('sale_type', 'wholesale')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $wholesale_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $wholesale_net_profit = $wholesale_revenue - $wholesale_return - $wholesale_product_cost;

            // pos sale
            $pos_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $pos_product_cost = $this->calculateAverageCOGS($pos_sale);
            $pos_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('sale_status', 1)
                ->where('sale_type', 'pos')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $pos_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.sale_type', 'pos')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $pos_net_profit = $pos_revenue - $pos_return - $pos_product_cost;
        }

        //cash flow of last 6 months
        $start = strtotime(date('Y-m-01', strtotime('-6 month', strtotime(date('Y-m-d')))));
        $end = strtotime(date('Y-m-' . date('t', mktime(0, 0, 0, date("m"), 1, date("Y")))));

        while ($start < $end) {
            $start_date = date("Y-m", $start) . '-' . '01';
            $end_date = date("Y-m", $start) . '-' . date('t', mktime(0, 0, 0, date("m", $start), 1, date("Y", $start)));

            if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
                $recieved_amount = DB::table('payments')->whereNotNull('sale_id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('amount');
                $sent_amount = DB::table('payments')->whereNotNull('purchase_id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('amount');
                $return_amount = Returns::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $purchase_return_amount = ReturnPurchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $expense_amount = Expense::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('amount');
                $payroll_amount = Payroll::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('amount');
            } else {
                $recieved_amount = DB::table('payments')->whereNotNull('sale_id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
                $sent_amount = DB::table('payments')->whereNotNull('purchase_id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
                $return_amount = Returns::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
                $purchase_return_amount = ReturnPurchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
                $expense_amount = Expense::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
                $payroll_amount = Payroll::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
            }
            $sent_amount = $sent_amount + $return_amount + $expense_amount + $payroll_amount;

            $payment_recieved[] = number_format((float)($recieved_amount + $purchase_return_amount), config('decimal'));
            $payment_sent[] = number_format((float)$sent_amount, config('decimal'));
            $month[] = date("F", strtotime($start_date));
            $start = strtotime("+1 month", $start);
        }
        // yearly report
        $start = strtotime(date("Y") . '-01-01');
        $end = strtotime(date("Y") . '-12-31');
        while ($start < $end) {
            $start_date = date("Y") . '-' . date('m', $start) . '-' . '01';
            $end_date = date("Y") . '-' . date('m', $start) . '-' . date('t', mktime(0, 0, 0, date("m", $start), 1, date("Y", $start)));
            if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
                $sale_amount = Sale::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $purchase_amount = Purchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('user_id', Auth::id())->sum('grand_total');
            } else {
                $sale_amount = Sale::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
                $purchase_amount = Purchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            }
            $yearly_sale_amount[] = number_format((float)$sale_amount, config('decimal'));
            $yearly_purchase_amount[] = number_format((float)$purchase_amount, config('decimal'));
            $start = strtotime("+1 month", $start);
        }
        //making strict mode true for this query
        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();
        //fetching data for auto updates
        if (!config('database.connections.saleprosaas_landlord') && Auth::user()->role_id <= 2 && isset($_COOKIE['login_now']) && $_COOKIE['login_now']) {
            $autoUpdateData = $this->general();
            $alertBugEnable =  $autoUpdateData['alertBugEnable'];
            $alertVersionUpgradeEnable = $autoUpdateData['alertVersionUpgradeEnable'];
        } else {
            $autoUpdateData = $alertBugEnable = $alertVersionUpgradeEnable = '';
        }

        $saleBillerSummary = [
            'POS' => $this->mergeSalesAndReturns($pos_biller_sales, $pos_biller_returns),
            'Online' =>  $this->mergeSalesAndReturns($online_biller_sales, $online_biller_returns),
            'Wholesale' =>  $this->mergeSalesAndReturns($wholesale_biller_sales, $wholesale_biller_returns),
            'Website' =>  $this->mergeSalesAndReturns($website_biller_sales, $website_biller_returns),
        ];

        // Check if there is any data
        $hasSaleBiller = collect($saleBillerSummary)->flatten(1)->isNotEmpty();



        return view('backend.index', compact('saleBillerSummary', 'hasSaleBiller', 'revenue', 'purchase', 'expense', 'income', 'return', 'purchase_return', 'profit', 'payment_recieved', 'payment_sent', 'month', 'yearly_sale_amount', 'yearly_purchase_amount', 'alertBugEnable', 'alertVersionUpgradeEnable', 'online_net_profit', 'website_net_profit', 'wholesale_net_profit', 'pos_net_profit', 'online_revenue', 'website_revenue', 'wholesale_revenue', 'pos_revenue',  'online_return', 'website_return', 'wholesale_return', 'pos_return', 'online_product_cost', 'website_product_cost', 'wholesale_product_cost', 'pos_product_cost'));
    }

    function  mergeSalesAndReturns($sales, $returns)
    {
        $result = [];

        foreach ($sales as $sale) {
            $result[$sale->biller_id] = (object)[
                'biller_id' => $sale->biller_id,
                'biller_name' => $sale->biller_name,
                'sale_count' => $sale->sale_count,
                'sales_value' => $sale->sales_value,
                'return_value' => 0,
                'net_sales' => $sale->sales_value
            ];
        }

        foreach ($returns as $return) {
            if (!isset($result[$return->biller_id])) {
                $result[$return->biller_id] = (object)[
                    'biller_id' => $return->biller_id,
                    'biller_name' => $return->biller_name,
                    'sale_count' => 0,
                    'sales_value' => 0,
                    'return_value' => $return->return_value,
                    'net_sales' => 0 - $return->return_value
                ];
            } else {
                $result[$return->biller_id]->return_value = $return->return_value;
                $result[$return->biller_id]->net_sales =
                    $result[$return->biller_id]->sales_value - $return->return_value;
            }
        }

        return array_values($result);
    }

    public function yearlyBestSellingPrice()
    {
        //making strict mode false for this query
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();
        $yearly_best_selling_price = Product_Sale::join('products', 'products.id', '=', 'product_sales.product_id')
            ->select(DB::raw('products.name as product_name, products.code as product_code, products.image as product_images, sum(total) as total_price'))
            ->whereDate('product_sales.created_at', '>=', date("Y") . '-01-01')
            ->whereDate('product_sales.created_at', '<=', date("Y") . '-12-31')
            ->groupBy('products.code')
            ->orderBy('total_price', 'desc')
            ->take(5)
            ->get();

        return response()->json($yearly_best_selling_price);
    }

    public function yearlyBestSellingQty()
    {
        //making strict mode false for this query
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();
        $yearly_best_selling_qty = Product_Sale::join('products', 'products.id', '=', 'product_sales.product_id')
            ->select(DB::raw('products.name as product_name, products.code as product_code, products.image as product_images, sum(product_sales.qty) as sold_qty'))
            ->whereDate('product_sales.created_at', '>=', date("Y") . '-01-01')
            ->whereDate('product_sales.created_at', '<=', date("Y") . '-12-31')
            ->groupBy('products.code')
            ->orderBy('sold_qty', 'desc')
            ->take(5)
            ->get();

        return response()->json($yearly_best_selling_qty);
    }

    public function monthlyBestSellingQty()
    {
        //making strict mode false for this query
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();
        $start_date = date("Y") . '-' . date("m") . '-' . '01';
        $end_date = date("Y") . '-' . date("m") . '-' . date('t', mktime(0, 0, 0, date("m"), 1, date("Y")));
        $best_selling_qty = Product_Sale::join('products', 'products.id', '=', 'product_sales.product_id')
            ->select(DB::raw('products.name as product_name, products.code as product_code, products.image as product_images, sum(product_sales.qty) as sold_qty'))
            ->whereDate('product_sales.created_at', '>=', $start_date)
            ->whereDate('product_sales.created_at', '<=', $end_date)
            ->groupBy('products.code')
            ->orderBy('sold_qty', 'desc')
            ->take(5)
            ->get();

        return response()->json($best_selling_qty);
    }

    public function recentSale()
    {
        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            $recent_sale = Sale::join('customers', 'customers.id', '=', 'sales.customer_id')->select('sales.id', 'sales.reference_no', 'sales.sale_status', 'sales.created_at', 'sales.grand_total', 'sales.user_id', 'customers.name')->orderBy('id', 'desc')->where('sales.user_id', Auth::id())->take(5)->get();
            return response()->json($recent_sale);
        } else {
            $recent_sale = Sale::join('customers', 'customers.id', '=', 'sales.customer_id')->select('sales.id', 'sales.reference_no', 'sales.sale_status', 'sales.created_at', 'sales.grand_total', 'customers.name')->orderBy('id', 'desc')->take(5)->get();
            return response()->json($recent_sale);
        }
    }

    public function recentPurchase()
    {
        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            $recent_purchase = Purchase::leftJoin('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')->select('purchases.id', 'purchases.reference_no', 'purchases.status', 'purchases.created_at', 'purchases.grand_total', 'purchases.user_id', 'suppliers.name')->orderBy('id', 'desc')->where('purchases.user_id', Auth::id())->take(5)->get();
            return response()->json($recent_purchase);
        } else {
            $recent_purchase = Purchase::leftJoin('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')->select('purchases.id', 'purchases.reference_no', 'purchases.status', 'purchases.created_at', 'purchases.grand_total', 'suppliers.name')->orderBy('id', 'desc')->take(5)->get();
            return response()->json($recent_purchase);
        }
    }

    public function recentQuotation()
    {
        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            $recent_quotation = Quotation::join('customers', 'customers.id', '=', 'quotations.customer_id')->select('quotations.id', 'quotations.reference_no', 'quotations.quotation_status', 'quotations.created_at', 'quotations.grand_total', 'quotations.user_id', 'customers.name')->orderBy('id', 'desc')->where('quotations.user_id', Auth::id())->take(5)->get();
            return response()->json($recent_quotation);
        } else {
            $recent_quotation = Quotation::join('customers', 'customers.id', '=', 'quotations.customer_id')->select('quotations.id', 'quotations.reference_no', 'quotations.quotation_status', 'quotations.created_at', 'quotations.grand_total', 'customers.name')->orderBy('id', 'desc')->take(5)->get();
            return response()->json($recent_quotation);
        }
    }

    public function recentPayment()
    {
        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            $recent_payment = Payment::select('id', 'payment_reference', 'amount', 'paying_method', 'created_at', 'user_id')->orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            return response()->json($recent_payment);
        } else {
            $recent_payment = Payment::select('id', 'payment_reference', 'amount', 'paying_method', 'created_at')->orderBy('id', 'desc')->take(5)->get();
            return response()->json($recent_payment);
        }
    }

    public function dashboardFilter($start_date, $end_date, $warehouse_id)
    {

        $start = \Carbon\Carbon::parse($start_date);
        $end = \Carbon\Carbon::parse($end_date);

        if (Auth::user()->role_id <= 2) {
            $diffInMonths = $start->diffInMonths($end);

            if ($diffInMonths > 2) {
                // Limit $end_date to max 2 months after $start_date
                $end = $start->copy()->addMonths(2);
                $end_date = $end->format('Y-m-d');
            }
        }

        if (Auth::user()->role_id > 2 && cache()->get('general_setting')->staff_access == 'own') {
            config()->set('database.connections.mysql.strict', false);
            DB::reconnect();
            $product_sale_data = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            config()->set('database.connections.mysql.strict', true);
            DB::reconnect();
            $product_cost = $this->calculateAverageCOGS($product_sale_data);
            $revenue = Sale::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->where('sale_status', 1)->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
            // $return = Returns::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $expense = Expense::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('amount');
            $income = Income::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('amount');
            $purchase = Purchase::whereDate('created_at', '>=', $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            $revenue = $revenue - $return + $income;
            // $profit = $revenue + $purchase_return - $product_cost - $expense;
            $profit = $revenue - $product_cost - $expense;



            // Online sale
            $online_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $online_product_cost = $this->calculateAverageCOGS($online_sale);
            $online_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'online')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $online_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'online')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $online_net_profit = $online_revenue - $online_return - $online_product_cost;

            // website sale
            $website_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $website_product_cost = $this->calculateAverageCOGS($website_sale);
            $website_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'website')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $website_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'website')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');

            $website_net_profit = $website_revenue - $website_return - $website_product_cost;

            // Wholesale sale
            $wholesale_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $wholesale_product_cost = $this->calculateAverageCOGS($wholesale_sale);
            $wholesale_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'wholesale')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $wholesale_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $wholesale_net_profit = $wholesale_revenue - $wholesale_return - $wholesale_product_cost;

            // pos sale
            $pos_sale = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date)
                ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                ->get();
            $pos_product_cost = $this->calculateAverageCOGS($pos_sale);
            $pos_revenue = Sale::whereDate('created_at', '>=', $start_date)
                ->where('user_id', Auth::id())
                ->where('sale_status', 1)
                ->where('sale_type', 'pos')
                ->whereDate('created_at', '<=', $end_date)
                ->sum(DB::raw('grand_total - shipping_cost'));
            $pos_return = DB::table('returns')
                ->join('sales', 'returns.sale_id', '=', 'sales.id')
                ->where('sales.user_id', Auth::id())
                ->where('sales.sale_type', 'pos')
                ->whereDate('returns.created_at', '>=', $start_date)
                ->whereDate('returns.created_at', '<=', $end_date)
                ->sum('returns.grand_total');
            $pos_net_profit = $pos_revenue - $pos_return - $pos_product_cost;
        } else {
            config()->set('database.connections.mysql.strict', false);
            DB::reconnect();
            $q = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))

                //->where('sales.user_id', Auth::id())
                ->where('sales.sale_status', 1)
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date);
            //return $start_date.$end_date.$warehouse_id;

            // online sale
            $online_sale_q = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'online')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date);
            // website sale
            $website_sale_q = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'website')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date);
            // wholesale sale
            $wholesale_sale_q = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'wholesale')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date);
            // pos sale
            $pos_sale_q = Sale::join('product_sales', 'sales.id', '=', 'product_sales.sale_id')
                ->select(DB::raw('product_sales.product_id, product_sales.product_batch_id, product_sales.sale_unit_id, sum(product_sales.qty) as sold_qty, sum(product_sales.return_qty) as return_qty, sum(product_sales.total) as sold_amount'))
                ->where('sales.sale_status', 1)
                ->where('sales.sale_type', 'pos')
                ->whereDate('sales.created_at', '>=', $start_date)
                ->whereDate('sales.created_at', '<=', $end_date);


            if ($warehouse_id == 0) {
                $product_sale_data = $q->groupBy('product_sales.product_id', 'product_sales.product_batch_id')->get();
                $online_sale_data = $online_sale_q->groupBy('product_sales.product_id', 'product_sales.product_batch_id')->get();
                $website_sale_data = $website_sale_q->groupBy('product_sales.product_id', 'product_sales.product_batch_id')->get();
                $wholesale_sale_data = $wholesale_sale_q->groupBy('product_sales.product_id', 'product_sales.product_batch_id')->get();
                $pos_sale_data = $pos_sale_q->groupBy('product_sales.product_id', 'product_sales.product_batch_id')->get();
            } else {
                $product_sale_data = $q->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                    ->get();
                $online_sale_data = $online_sale_q->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                    ->get();
                $website_sale_data = $website_sale_q->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                    ->get();
                $wholesale_sale_data = $wholesale_sale_q->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                    ->get();
                $pos_sale_data = $pos_sale_q->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('product_sales.product_id', 'product_sales.product_batch_id')
                    ->get();
            }


            config()->set('database.connections.mysql.strict', true);
            DB::reconnect();
            $product_cost = $this->calculateAverageCOGS($product_sale_data);
            $online_product_cost = $this->calculateAverageCOGS($online_sale_data);
            $website_product_cost = $this->calculateAverageCOGS($website_sale_data);
            $wholesale_product_cost = $this->calculateAverageCOGS($wholesale_sale_data);
            $pos_product_cost = $this->calculateAverageCOGS($pos_sale_data);

            if ($warehouse_id == 0) {
                $revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sales.sale_status', 1)->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
                $online_revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sale_status', 1)->where('sale_type', 'online')->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
                $website_revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sale_status', 1)->where('sale_type', 'website')->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
                $wholesale_revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sale_status', 1)->where('sale_type', 'wholesale')->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));
                $pos_revenue = Sale::whereDate('created_at', '>=', $start_date)->where('sale_status', 1)->where('sale_type', 'pos')->whereDate('created_at', '<=', $end_date)->sum(DB::raw('grand_total - shipping_cost'));

                $return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $online_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('sales.sale_type', 'online')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $website_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('sales.sale_type', 'website')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $wholesale_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('sales.sale_type', 'wholesale')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $pos_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('sales.sale_type', 'pos')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');


                $purchase_return = ReturnPurchase::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('grand_total');
            } else {
                $revenue = Sale::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->where('sale_status', 1)
                    ->sum(DB::raw('grand_total - shipping_cost'));
                $online_revenue = Sale::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->where('sale_status', 1)
                    ->where('sale_type', 'online')
                    ->sum(DB::raw('grand_total - shipping_cost'));
                $website_revenue = Sale::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->where('sale_status', 1)
                    ->where('sale_type', 'website')
                    ->sum(DB::raw('grand_total - shipping_cost'));
                $wholesale_revenue = Sale::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->where('sale_status', 1)
                    ->where('sale_type', 'wholesale')
                    ->sum(DB::raw('grand_total - shipping_cost'));
                $pos_revenue = Sale::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->where('sale_status', 1)
                    ->where('sale_type', 'pos')
                    ->sum(DB::raw('grand_total - shipping_cost'));



                $return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');


                $website_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('sales.sale_type', 'website')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $pos_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('sales.sale_type', 'pos')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $wholesale_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('sales.sale_type', 'wholesale')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
                $online_return = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('sales.sale_type', 'online')
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->sum('returns.grand_total');


                $purchase_return = ReturnPurchase::where('warehouse_id', $warehouse_id)
                    ->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->sum('returns.grand_total');
            }

            $expense = Expense::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
            $income = Income::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('amount');
            $revenue = $revenue - $return + $income;
            // $profit = $revenue + $purchase_return - $product_cost - $expense;
            $profit = $revenue - $product_cost - $expense;

            $online_net_profit = $online_revenue - $online_return - $online_product_cost;
            $website_net_profit = $website_revenue - $website_return - $website_product_cost;
            $wholesale_net_profit = $wholesale_revenue - $wholesale_return - $wholesale_product_cost;
            $pos_net_profit = $pos_revenue - $pos_return - $pos_product_cost;

            $data[0] = $revenue;
            $data[1] = $return;
            $data[2] = $profit;
            $data[3] = $purchase_return;
            $data[4] = $expense;
            $data[5] = $income;
            $data[6] = $product_cost;
            $data[7] = $online_revenue;
            $data[8] = $online_return;
            $data[9] = $online_net_profit;
            $data[10] = $online_product_cost;
            $data[11] = $website_revenue;
            $data[12] = $website_return;
            $data[13] = $website_net_profit;
            $data[14] = $website_product_cost;
            $data[15] = $wholesale_revenue;
            $data[16] = $wholesale_return;
            $data[17] = $wholesale_net_profit;
            $data[18] = $wholesale_product_cost;
            $data[19] = $pos_revenue;
            $data[20] = $pos_return;
            $data[21] = $pos_net_profit;
            $data[22] = $pos_product_cost;
        }

        if (Auth::user()->role_id <= 2) {

            if ($warehouse_id == 0) {
                // online billers sales
                $online_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'online')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
                // online billers returns
                $online_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'online')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers sales
                $pos_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'pos')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers returns
                $pos_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'pos')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // warehouse billers sales
                $wholesale_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'wholesale')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers returns
                $wholesale_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'wholesale')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers sales
                $website_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'website')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers returns
                $website_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'website')
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
            } else {
                // online billers sales
                $online_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'online')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
                // online billers returns
                $online_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'online')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers sales
                $pos_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'pos')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers returns
                $pos_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'pos')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // warehouse billers sales
                $wholesale_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers returns
                $wholesale_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers sales
                $website_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'website')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers returns
                $website_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'website')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
            }
        } else {

            if ($warehouse_id == 0) {
                // online billers sales
                $online_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', value: $start_date)
                    ->whereDate('sales.created_at',  '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'online')
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // online billers returns
                $online_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'online')
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers sales
                $pos_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'pos')
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers returns
                $pos_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'pos')
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers sales
                $wholesale_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers returns
                $wholesale_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers sales
                $website_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'website')
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers returns
                $website_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'website')
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
            } else {
                // online billers sales
                $online_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', value: $start_date)
                    ->whereDate('sales.created_at',  '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'online')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // online billers returns
                $online_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'online')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers sales
                $pos_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'pos')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // pos billers returns
                $pos_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'pos')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers sales
                $wholesale_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // wholesale billers returns
                $wholesale_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'wholesale')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers sales
                $website_biller_sales = DB::table('sales')
                    ->join('billers', 'sales.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(sales.grand_total) as sales_value'),
                        DB::raw('COUNT(sales.id) as sale_count')
                    )
                    ->whereDate('sales.created_at', '>=', $start_date)
                    ->whereDate('sales.created_at', '<=', $end_date)
                    ->where('sales.sale_status', 1)
                    ->where('sales.sale_type', 'website')
                    ->where('sales.warehouse_id', $warehouse_id)
                    ->where('sales.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();

                // website billers returns
                $website_biller_returns = DB::table('returns')
                    ->join('sales', 'returns.sale_id', '=', 'sales.id')
                    ->join('billers', 'returns.biller_id', '=', 'billers.id')
                    ->select(
                        'billers.id as biller_id',
                        'billers.name as biller_name',
                        DB::raw('SUM(returns.grand_total) as return_value'),
                        DB::raw('COUNT(returns.id) as return_count')
                    )
                    ->whereDate('returns.created_at', '>=', $start_date)
                    ->whereDate('returns.created_at', '<=', $end_date)
                    ->where('sales.sale_type', 'website')
                    ->where('returns.warehouse_id', $warehouse_id)
                    ->where('returns.biller_id', Auth::user()->biller_id)
                    ->groupBy('billers.id', 'billers.name')
                    ->get();
            }
        }

        $saleBillerSummary = [
            'POS' => $this->mergeSalesAndReturns($pos_biller_sales, $pos_biller_returns),
            'Online' =>  $this->mergeSalesAndReturns($online_biller_sales, $online_biller_returns),
            'Wholesale' =>  $this->mergeSalesAndReturns($wholesale_biller_sales, $wholesale_biller_returns),
            'Website' =>  $this->mergeSalesAndReturns($website_biller_sales, $website_biller_returns),
        ];

        // Check if there is any data
        $hasSaleBiller = collect($saleBillerSummary)->flatten(1)->isNotEmpty();

        $data[23] = $saleBillerSummary;
        $data[24] = $hasSaleBiller;


        return $data;
    }

    public function calculateAverageCOGS($product_sale_data)
    {
        $product_cost = 0;
        foreach ($product_sale_data as $key => $product_sale) {
            $product_data = Product::select('type', 'product_list', 'variant_list', 'qty_list')->find($product_sale->product_id);
            if ($product_data && $product_data->type == 'combo') {
                $product_list = explode(",", $product_data->product_list);
                if ($product_data->variant_list)
                    $variant_list = explode(",", $product_data->variant_list);
                else
                    $variant_list = [];
                $qty_list = explode(",", $product_data->qty_list);

                foreach ($product_list as $index => $product_id) {
                    if (count($variant_list) && $variant_list[$index]) {
                        $product_purchase_data = ProductPurchase::where([
                            ['product_id', $product_id],
                            ['variant_id', $variant_list[$index]]
                        ])
                            ->select('recieved', 'purchase_unit_id', 'total')
                            ->get();
                    } else {
                        $product_purchase_data = ProductPurchase::where('product_id', $product_id)
                            ->select('recieved', 'purchase_unit_id', 'total')
                            ->get();
                    }
                    $total_received_qty = 0;
                    $total_purchased_amount = 0;
                    $sold_qty = ($product_sale->sold_qty - $product_sale->return_qty) * $qty_list[$index];
                    $units = Unit::select('id', 'operator', 'operation_value')->get();
                    foreach ($product_purchase_data as $key => $product_purchase) {
                        $purchase_unit_data = $units->where('id', $product_purchase->purchase_unit_id)->first();
                        if ($purchase_unit_data->operator == '*')
                            $total_received_qty += $product_purchase->recieved * $purchase_unit_data->operation_value;
                        else
                            $total_received_qty += $product_purchase->recieved / $purchase_unit_data->operation_value;
                        $total_purchased_amount += $product_purchase->total;
                    }
                    if ($total_received_qty)
                        $averageCost = $total_purchased_amount / $total_received_qty;
                    else
                        $averageCost = 0;
                    $product_cost += $sold_qty * $averageCost;
                }
            } else {
                if ($product_sale->product_batch_id) {
                    $product_purchase_data = ProductPurchase::where([
                        ['product_id', $product_sale->product_id],
                        ['product_batch_id', $product_sale->product_batch_id]
                    ])
                        ->select('recieved', 'purchase_unit_id', 'total')
                        ->get();
                } elseif ($product_sale->variant_id) {
                    $product_purchase_data = ProductPurchase::where([
                        ['product_id', $product_sale->product_id],
                        ['variant_id', $product_sale->variant_id]
                    ])
                        ->select('recieved', 'purchase_unit_id', 'total')
                        ->get();
                } else {
                    $product_purchase_data = ProductPurchase::where('product_id', $product_sale->product_id)
                        ->select('recieved', 'purchase_unit_id', 'total')
                        ->get();
                }
                $total_received_qty = 0;
                $total_purchased_amount = 0;
                $units = Unit::select('id', 'operator', 'operation_value')->get();
                if ($product_sale->sale_unit_id) {
                    $sale_unit_data = $units->where('id', $product_sale->sale_unit_id)->first();
                    if ($sale_unit_data->operator == '*')
                        $sold_qty = ($product_sale->sold_qty - $product_sale->return_qty) * $sale_unit_data->operation_value;
                    else
                        $sold_qty = ($product_sale->sold_qty - $product_sale->return_qty) / $sale_unit_data->operation_value;
                } else {
                    $sold_qty = ($product_sale->sold_qty - $product_sale->return_qty);
                }
                foreach ($product_purchase_data as $key => $product_purchase) {
                    $purchase_unit_data = $units->where('id', $product_purchase->purchase_unit_id)->first();
                    if ($purchase_unit_data) {
                        if ($purchase_unit_data->operator == '*')
                            $total_received_qty += $product_purchase->recieved * $purchase_unit_data->operation_value;
                        else
                            $total_received_qty += $product_purchase->recieved / $purchase_unit_data->operation_value;
                        $total_purchased_amount += $product_purchase->total;
                    }
                }
                if ($total_received_qty)
                    $averageCost = $total_purchased_amount / $total_received_qty;
                else
                    $averageCost = 0;
                $product_cost += $sold_qty * $averageCost;
            }
        }
        return $product_cost;
    }

    public function myTransaction($year, $month)
    {
        $start = 1;
        $number_of_day = date('t', mktime(0, 0, 0, $month, 1, $year));
        while ($start <= $number_of_day) {
            if ($start < 10)
                $date = $year . '-' . $month . '-0' . $start;
            else
                $date = $year . '-' . $month . '-' . $start;
            $sale_generated[$start] = Sale::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $sale_grand_total[$start] = Sale::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $purchase_generated[$start] = Purchase::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $purchase_grand_total[$start] = Purchase::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $quotation_generated[$start] = Quotation::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $quotation_grand_total[$start] = Quotation::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $start++;
        }
        $start_day = date('w', strtotime($year . '-' . $month . '-01')) + 1;
        $prev_year = date('Y', strtotime('-1 month', strtotime($year . '-' . $month . '-01')));
        $prev_month = date('m', strtotime('-1 month', strtotime($year . '-' . $month . '-01')));
        $next_year = date('Y', strtotime('+1 month', strtotime($year . '-' . $month . '-01')));
        $next_month = date('m', strtotime('+1 month', strtotime($year . '-' . $month . '-01')));
        return view('backend.user.my_transaction', compact('start_day', 'year', 'month', 'number_of_day', 'prev_year', 'prev_month', 'next_year', 'next_month', 'sale_generated', 'sale_grand_total', 'purchase_generated', 'purchase_grand_total', 'quotation_generated', 'quotation_grand_total'));
    }

    public function switchTheme($theme)
    {
        setcookie('theme', $theme, time() + (86400 * 365), "/");
    }

    public function sessionRenew(Request $request)
    {
        return response()->json('success');
    }
}
