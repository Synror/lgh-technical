<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OnRent extends Model
{
    protected $table = 'on_rent';
    protected $fillable = [
        'gen_date',
        'contracts',
        'quotes',
        'weekly_value',
    ];

    public function onRentLines(): HasMany
    {
        return $this->hasMany(OnRentLines::class);
    }
}
