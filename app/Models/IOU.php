<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IOU extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'amount',
        'date',
        'description'
    ];
}
