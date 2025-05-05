<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $fillable =[
        "province_id", "name_en", "name_si", "name_ta"
    ];

    public function cities()
    {
        return $this->hasMany(Cities::class, 'district_id');
    }


}
