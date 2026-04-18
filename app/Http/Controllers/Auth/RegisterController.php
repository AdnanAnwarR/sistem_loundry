<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('form.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:8',
            'terms' => 'required|in:on'
        ], [
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon wajib di isi',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 8 karakter',
            'terms.required' => 'Syarat dan ketentuan wajib di centang'
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('register.index')
            ->withErrors([
                $validator->errors()
            ])
            ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->phone,
            'role' => 'pelanggan',
            'is_active' => true,
            'password' => $request->password,
        ]);

        return redirect()->route('login.index')->with('success', 'Data berhasil disimpan. Silahkan login untuk melanjutkan');
    }
}
