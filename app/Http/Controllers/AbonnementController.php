<?php

namespace App\Http\Controllers;

use App\Orders;
use App\QuickPay\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use QuickPay\QuickPay;

class AbonnementController extends Controller
{
    public function index()
    {
        return view('abonnement');
    }

    public function subscribe(Request $request)
    {
        $amount = $request->input('amount');

        $sub = new Subscription(Auth::user());

        $link = $sub->generateLink($amount);

        return redirect($link);
    }
}
