<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = [
        "district_id ", "name_en", "name_si", "name_ta"
    ];


    public function district()
    {
        return $this->hasMany(Districts::class, 'district_id ');
    }

}
