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
        'contact_number',
        'payment_method',
        'amount_paid',
        'payment_date',
    ];

    public function clamping()
    {
        return $this->belongsTo(Clamping::class, 'ticket_no', 'ticket_no');
    }
    
}
