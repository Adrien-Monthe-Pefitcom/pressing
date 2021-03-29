<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'predicted_return',
        'additional_intel',
        'total_cost',
        'client_id',
        'employee_id',
        'amount_perceived',
        'collected',
        'return_status',
        'client_name'
    ];
}
