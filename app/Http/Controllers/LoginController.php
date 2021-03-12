<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('companies');
        } else {
            return redirect(route('login') . '#error-login');
        }
    }

    public function register(Request $request)
    {
        $result = User::query()->where('username', '=', $request->email)->get();
        if($result->count() == 0) {
            User::factory()->createOne([
                'username' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect(route('login') . ($result->count() > 0 ? '#error' : '#success'));
    }
}
