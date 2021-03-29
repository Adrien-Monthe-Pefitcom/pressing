<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'material',
        'color',
        'description',
        'state',
        'price',
        'collected',
        'return_status',
        'id_order'
    ];

}
