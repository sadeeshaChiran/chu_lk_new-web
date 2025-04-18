<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingSlip extends Model
{
    use HasFactory;

    protected $fillable = ["reference_no","waybill_id", "sale_id", "delivery_id", "amount", "status","user_id"];

    public function sale()
    {
    	return $this->belongsTo('App\Models\Sale');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function delivery()
    {
    	return $this->belongsTo('App\Models\Delivery');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product', 'packing_slip_products');
    }
}
