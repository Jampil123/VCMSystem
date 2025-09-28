<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clamping extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_no',
        'plate_no',
        'reason',
        'location',
        'date_clamped',
        'status',
        'photo',
        'fine_amount',
    ];
}
