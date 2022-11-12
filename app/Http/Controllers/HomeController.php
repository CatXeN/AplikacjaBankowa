<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
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

        return view('home', ['bankAccount' => $bank_account]);
    }
}
