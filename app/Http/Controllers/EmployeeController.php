<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function viewAccount() {
        $user = User::with('employee')->where('id', Auth::id())->firstOrFail();
        return view('employee/account', ['user' => $user]);
    }

    public function updateAccount(Request $request) {
        $employee = Employee::find($request->employeeId);
        $employee->fullname = $request->fullname;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->birthday = $request->birthday;
        $employee->save();
        return back();
    }
}
