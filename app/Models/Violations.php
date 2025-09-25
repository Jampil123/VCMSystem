<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violations extends Model
{
    use HasFactory;
    protected $table = 'violations';

    protected $fillable = [
        'plate_number',
        'owner_name',
        'violation_type',
        'fine_amount',
        'status',
    ];
}
