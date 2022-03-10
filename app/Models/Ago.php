<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ago extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'mobile',
        'truck_no',
        'shipment_no',
        'destination',
        'date',
        'quantity',
        'rate',
        'total_cost'   
    ];

    
}
