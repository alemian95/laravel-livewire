<?php

namespace App\Models;

use App\Traits\HasHumanTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory, HasHumanTimestamps;

    protected $fillable = [
        'code', 'name', 'is_active', 'value'
    ];
}
