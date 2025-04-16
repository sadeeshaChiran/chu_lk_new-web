<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashRegister;
use App\Models\Sale;
use App\Models\Payment;
use App\Models\Returns;
use App\Models\Expense;
use Auth;

class CashRegisterController extends Controller
{
	public function index()
	{
		if (Auth::user()->role_id <= 2) {
			$lims_cash_register_all = CashRegister::with('user', 'warehouse')->get();
	
			foreach ($lims_cash_register_all as $register) {
				$total_sale_amount = Sale::where([
					['cash_register_id', $register->id],
					['sale_status', 1]
				])->sum('grand_total');
	
				$total_payment = Payment::where('cash_register_id', $register->id)->sum('amount');
	
				$cash_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Cash']
				])->sum('amount');
	
				$credit_card_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Credit Card']
				])->sum('amount');
	
				$gift_card_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Gift Card']
				])->sum('amount');
	
				$deposit_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Deposit']
				])->sum('amount');
	
				$cheque_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Cheque']
				])->sum('amount');
	
				$paypal_payment = Payment::where([
					['cash_register_id', $register->id],
					['paying_method', 'Paypal']
				])->sum('amount');
	
				$total_sale_return = Returns::where('cash_register_id', $register->id)->sum('grand_total');
				$total_expense = Expense::where('cash_register_id', $register->id)->sum('amount');
	
				$total_cash = $register->cash_in_hand + $cash_payment - ($total_sale_return + $total_expense);
	
				// Inject custom attributes into the model
				$register->total_sale_amount = $total_sale_amount;
				$register->total_payment = $total_payment;
				$register->cash_payment = $cash_payment;
				$register->credit_card_payment = $credit_card_payment;
				$register->gift_card_payment = $gift_card_payment;
				$register->deposit_payment = $deposit_payment;
				$register->cheque_payment = $cheque_payment;
				$register->paypal_payment = $paypal_payment;
				$register->total_sale_return = $total_sale_return;
				$register->total_expense = $total_expense;
				$register->total_cash = $total_cash;
			}
	
			return view('backend.cash_register.index', compact('lims_cash_register_all'));
		} else {
			return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
		}
	}
	
	
	public function store(Request $request)
	{
		$data = $request->all();
		$data['status'] = true;
		$data['user_id'] = Auth::id();
		CashRegister::create($data);
		return redirect()->back()->with('message', 'Cash register created successfully');
	}

	public function getDetails($id)
	{
		$cash_register_data = CashRegister::find($id);

		$data['cash_in_hand'] = $cash_register_data->cash_in_hand;
		$data['closing_balance'] = $cash_register_data->closing_balance;
		$data['total_sale_amount'] = Sale::where([
										['cash_register_id', $cash_register_data->id],
										['sale_status', 1]
									])->sum('grand_total');
		$data['total_payment'] = Payment::where('cash_register_id', $cash_register_data->id)->sum('amount');
		$data['cash_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Cash']
								])->sum('amount');
		$data['credit_card_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Credit Card']
								])->sum('amount');
		$data['gift_card_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Gift Card']
								])->sum('amount');
		$data['deposit_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Deposit']
								])->sum('amount');
		$data['cheque_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Cheque']
								])->sum('amount');
		$data['paypal_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Paypal']
								])->sum('amount');
		$data['total_sale_return'] = Returns::where('cash_register_id', $cash_register_data->id)->sum('grand_total');
		$data['total_expense'] = Expense::where('cash_register_id', $cash_register_data->id)->sum('amount');
		$data['total_cash'] = $data['cash_in_hand'] + $data['cash_payment'] - ($data['total_sale_return'] + $data['total_expense']);
		$data['status'] = $cash_register_data->status;
		return $data;
	}

	public function showDetails($warehouse_id)
	{
		$cash_register_data = CashRegister::where([
					    		['user_id', Auth::id()],
					    		['warehouse_id', $warehouse_id],
					    		['status', true]
					    	])->first();

		$data['cash_in_hand'] = $cash_register_data->cash_in_hand;
		$data['closing_balance'] = $cash_register_data->closing_balance;
		$data['total_sale_amount'] = Sale::where([
										['cash_register_id', $cash_register_data->id],
										['sale_status', 1]
									])->sum('grand_total');
		$data['total_payment'] = Payment::where('cash_register_id', $cash_register_data->id)->sum('amount');
		$data['cash_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Cash']
								])->sum('amount');
		$data['credit_card_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Credit Card']
								])->sum('amount');
		$data['gift_card_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Gift Card']
								])->sum('amount');
		$data['deposit_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Deposit']
								])->sum('amount');
		$data['cheque_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Cheque']
								])->sum('amount');
		$data['paypal_payment'] = Payment::where([
									['cash_register_id', $cash_register_data->id],
									['paying_method', 'Paypal']
								])->sum('amount');
		$data['total_sale_return'] = Returns::where('cash_register_id', $cash_register_data->id)->sum('grand_total');
		$data['total_expense'] = Expense::where('cash_register_id', $cash_register_data->id)->sum('amount');
		$data['total_cash'] = $data['cash_in_hand'] + $data['cash_payment'] - ($data['total_sale_return'] + $data['total_expense']);
		$data['id'] = $cash_register_data->id;
		return $data;
	}

	public function close(Request $request)
	{
		$cash_register_data = CashRegister::find($request->cash_register_id);
		$cash_register_data->closing_balance = $request->closing_balance;
		$cash_register_data->note = $request->note;
		$cash_register_data->status = 0;
		$cash_register_data->save();
		return redirect()->back()->with('message', 'Cash register closed successfully');
	}

    public function checkAvailability($warehouse_id)
    {
    	$open_register_number = CashRegister::where([
						    		['user_id', Auth::id()],
						    		['warehouse_id', $warehouse_id],
						    		['status', true]
						    	])->count();
    	if($open_register_number)
    		return 'true';
    	else
    		return 'false';
    }
}
