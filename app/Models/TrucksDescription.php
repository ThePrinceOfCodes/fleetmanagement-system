<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrucksDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_no',
        'capacity',
        'loading_no',
        'date_acquired',
        'status',
        'drivers_name',
        'drivers_mobile'
    ];
}
