<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrucksExpenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_no',
        'description',
        'amount',
        'date',
        'location'
    ];
}
