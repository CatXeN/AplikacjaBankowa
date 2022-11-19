<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $bank_account = BankAccount::where('user_id', '=', $id)->first();

        $transactions_history = TransactionHistory::where('recipient_account_number', '=', $bank_account->number)
                                                    ->join('users', 'users.id', '=', 'user_id')
                                                    ->orWhere('owner_account_number', '=', $bank_account->number)
                                                    ->orderBy('transactions_history.created_at', 'desc')
                                                    ->get();

        return view('home', ['bankAccount' => $bank_account, 'transactions_history' => $transactions_history]);
    }
}
