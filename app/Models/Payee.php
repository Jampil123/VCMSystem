<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_no',
        'name',
        'payment_method',
        'amount_paid',
    ];

    public function clamping()
    {
        return $this->belongsTo(Clamping::class, 'ticket_no', 'ticket_no');
    }
    
}
