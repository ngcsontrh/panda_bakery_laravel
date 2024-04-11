<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Manager;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function viewAccount() {
        $user = User::with('manager')->where('id', Auth::id())->firstOrFail();
        return view('manager/account', ['user' => $user]);
    }

    public function viewAddProduct() {
        return view('manager/add_product');
    }

    public function viewManageEmployees() {
        return view('manager/employees', ['employees' => Employee::all()]);
    }

    public function addNewProduct(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = asset('images/products/' . $imageName);
        }

        Product::create($validated);
        session()->flash('success', 'Đăng sản phẩm thành công');
        return redirect()->back();
    }

    public function addNewEmployee(Request $request) {
        $validatedAccount = $request->validate([
            'username' => ['required', 'string', 'min:8', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'role' => 'required',
        ]);
        
        $validatedInformation = $request->validate([
            'fullname' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'birthday' => 'required|date',
            'gender' => 'required'
        ]);

        User::create($validatedAccount);

        $employeeId = DB::table('users')->where('username', $validatedAccount['username'])->value('id');
        Employee::create(array_merge($validatedInformation, ['user_id' => $employeeId]));
        session()->flash('success', 'Đã thêm Nhân viên thành công');
        return redirect()->back();

    }

    public function updateAccount(Request $request) {
        $employee = Manager::find($request->employeeId);
        $employee->fullname = $request->fullname;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->birthday = $request->birthday;
        $employee->save();
        return back();
    }
}
