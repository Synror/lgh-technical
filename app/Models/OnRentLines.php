<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnRentLines extends Model
{
    protected $table = 'on_rent_lines';

    protected $fillable = [
        'header_id',
        'account',
        'order_number',
        'rental_start',
        'dispatch_id',
        'order_value',
    ];
}
