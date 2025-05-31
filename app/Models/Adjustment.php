<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $fillable =[
        "reference_no", "warehouse_id", "document", "total_qty", "item",
         "note", "created_by", "updated_by", "created_at", "updated_at"
    ];
}
