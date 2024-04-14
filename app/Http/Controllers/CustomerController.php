<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function viewAccount() {
        $user = User::with('customer')->where('id', Auth::id())->firstOrFail();
        if($user->role === 'Customer') {
            return view('customer/account', ['user' => $user]);
        }
    }

    public function viewCart() {
        return view('customer/cart');
    }

    public function updateAccount(Request $request) {
        $customer = Customer::find($request->customerId);
        $customer->fullname = $request->fullname;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        return back();
    }
}
