<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return redirect()->route('user.dashboard');
        }
        return view('form.login');
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email tidak valid',
            'password' => 'Password wajib di isi'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/user/dashboard')->with('success', 'Welcome back!');
        }

        return back()
            ->withErrors(['email' => 'Kredensial yang diberikan tidak sesuai.'])
            ->onlyInput('email');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
