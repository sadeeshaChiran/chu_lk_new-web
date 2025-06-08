<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    protected $fillable = ["cash_in_hand", "user_id", "warehouse_id","cash_hand_over","next_day_opening_balance","note" ,"status","closing_cash_balance","closing_credit_card_balance","closing_deposit_balance"];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function warehouse()
    {
    	return $this->belongsTo('App\Models\Warehouse');
    }
}
