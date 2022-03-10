<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile',
        'name',
        'yob',
        'licence_no',
        'licence_status',
        'licence_expirydate',
    ];
}
