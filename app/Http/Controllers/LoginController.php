<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'     => 'SMK Taruna Bangsa - Login Administrator',
                    'content'   => 'login/index'
                ];
        return view('login/wrapper', $data);
    }

    // reset
    public function reset()
    {
        $data = [   'title'     => 'Reset Password',
                    'content'   => 'login/reset'
                ];
        return view('login/wrapper', $data);
    }

    // proses
    public function proses(Request $request)
    {
        return redirect()->to('admin/dasbor')->with('sukses','Login Berhasil');
    }

    // prosesGantiPassword
    public function prosesGantiPassword(Request $request)
    {
        return redirect()->to('login')->with('sukses','Email berisi link reset password telah kami kirimkan. Silakan klik link tersebut untuk melakukan perubahan password.');
    }

    // logout
    public function logout()
    {
        return redirect()->to('login')->with('sukses','Logout Berhasil');
    }
}
