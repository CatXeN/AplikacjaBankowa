<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransferController extends Controller
{
    public function index() {
        $id = auth()->user()->id;
        $bank_account = BankAccount::where('user_id', '=', $id)->get();

        return view('transfer', ['bank_account' => $bank_account]);
    }

    public function send_money(Request $request) {
        $id = auth()->user()->id;
        $values =  $request->all();

        TransactionHistory::create([
            'recipient_account_number' => $values['recipient_number'],
            'owner_account_number' => $values['owner_account'],
            'recipient_name' => $values['recipient_name'],
            'transfer_title' => $values['title'],
            'amount' => $values['amount'],
            'user_id' => $id
        ]);

        $owner = BankAccount::firstWhere('number', '=', $values['owner_account']);
        $owner->balance = $owner->balance - $values['amount'];
        $owner->save();

        $recipient = BankAccount::firstWhere('number', '=', $values['recipient_number']);
        $recipient->balance = $recipient->balance + $values['amount'];
        $recipient->save();

        return redirect('/home');
    }

    public function pageData(Request $request, $type) {
        $id = auth()->user()->id;
        $bank_account = BankAccount::where('user_id', '=', $id)->first();

        if ($type === 'all') {
            return view('history', ['bankAccount' => $bank_account, 'transactions_history' =>
                TransactionHistory::where('recipient_account_number', '=', $bank_account->number)
                ->join('users', 'users.id', '=', 'user_id')
                ->orWhere('owner_account_number', '=', $bank_account->number)
                ->orderBy('transactions_history.created_at', 'desc')
                ->get()]);
        }
        else if ($type === 'charge') {
            return view('history', ['bankAccount' => $bank_account, 'transactions_history' =>
                TransactionHistory::where('owner_account_number', '=', $bank_account->number)
                    ->join('users', 'users.id', '=', 'user_id')
                    ->orderBy('transactions_history.created_at', 'desc')
                    ->get()]);
        }
        else if ($type === 'recognition') {
            return view('history', ['bankAccount' => $bank_account, 'transactions_history' =>
                TransactionHistory::where('recipient_account_number', '=', $bank_account->number)
                    ->join('users', 'users.id', '=', 'user_id')
                    ->orderBy('transactions_history.created_at', 'desc')
                    ->get()]);
        }
    }
}
