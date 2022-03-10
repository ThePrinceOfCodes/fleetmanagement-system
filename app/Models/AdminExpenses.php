<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminExpenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'for',
        'description',
        'amount',
        'date',
        'location'
    ];
}
