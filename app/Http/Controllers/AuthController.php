<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('auth/login');
    }

    public function viewRegister() {
        return view('auth/register');
    }

    public function registerNewUser(Request $request)
    {
      $validated = $request->validate([
        'username' => ['required', 'unique:users', 'min:8', 'max:255'],
        'password' => ['required', 'confirmed', 'min:8', 'max:255'],
      ]);
      $user = User::create($validated);

      Customer::create([
        'user_id' => $user->id,
      ]);
    
      Auth::login($user);
      return redirect('/');
    }    

    public function loginUser(Request $request) {
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:8', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        session()->flash('error', 'Tên tài khoản hoặc mật khẩu không đúng');
        return redirect()->back();
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/');   
    }
}
