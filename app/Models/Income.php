<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_no',
        'destination',
        'date',
        'shipment_no',
        'frieght_cost',
        'tax'
    ];
}
