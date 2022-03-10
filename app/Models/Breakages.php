<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'truck_no',
        'shipment_date',
        'shipment_no',
        'shipment_point',
        'description',
        'breakages',
        'breakages_cost'
    ];
}
