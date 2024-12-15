<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TransactionsController extends Controller
{
    public function view(Request $request): View
    {
        $transactions = Transactions::all();
        foreach ($transactions as $transaction) {
            $transaction->user_name = User::find($transaction->user_id)->name;
            $transaction->item_name = Items::find($transaction->item_id)->name;
        }
        return view('transactionlist', ['transactions' => $transactions]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'total' => ['required', 'numeric'],
            'address' => ['string', 'max:255'],
        ]);

        $item = Items::find($request->iid);

        $transaction = Transactions::create([
            'total' => $request->total,
            'address' => $request->address,
            'price' => $item->price,
            'total_price' => $item->price * $request->total,
            'user_id' => Auth::id(),
            'item_id' => $request->iid,
            'status' => 'Sedang dikirim'
        ]);

        $item->stock -= $request->total;
        $item->save();

        return redirect(route('user.buy_history', ['uid' => Auth::id()]));
    }

    public function update(Request $request): RedirectResponse
    {

        $transaction = Transactions::find($request->tid);
        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->back();
    }
}
