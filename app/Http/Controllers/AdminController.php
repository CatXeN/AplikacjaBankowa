<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin', ['users' => $users]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $account = BankAccount::where('user_id', '=', $id)->first();

        return view('users/edit', ['user' => $user, 'account' => $account]);
    }

    public function edit_user(Request $request)
    {
        $values =  $request->all();

        $user = User::firstWhere('id', '=', $values['id']);
        $user->name = $values['name'];
        $user->email = $values['email'];
        $user->save();

        $bankAccount = BankAccount::firstWhere('user_id', '=', $values['id']);
        $bankAccount->balance = $values['balance'];
        $bankAccount->save();

        return redirect('/admin');
    }
}
