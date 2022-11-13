<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $table = 'transactions_history';

    protected $fillable = [
        'recipient_account_number',
        'owner_account_number',
        'recipient_name',
        'transfer_title',
        'amount',
        'user_id'
    ];
}
