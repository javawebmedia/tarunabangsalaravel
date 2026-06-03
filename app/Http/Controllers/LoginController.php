<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;

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
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // Ambil data input
        $username   = $request->username;
        $password   = $request->password;
        // check data user
        $user       = Users::login($username,$password);
        // proses login
        if (!$user) {
            return redirect('login')->with('warning', 'Username atau password salah');
        }else{
            $request->session()->regenerate();
            // set session
            $request->session()->put([
                'id_user'           => $user->id_user,
                'nama'              => $user->nama,
                'akses_level'       => $user->akses_level,
                'username'          => $user->username
            ]);
            return redirect()->to('admin/dasbor')->with('sukses','Login Berhasil');
        }
    }

    // prosesGantiPassword
    public function prosesGantiPassword(Request $request)
    {
        return redirect()->to('login')->with('sukses','Email berisi link reset password telah kami kirimkan. Silakan klik link tersebut untuk melakukan perubahan password.');
    }

    // logout
    public function logout()
    {
        session()->forget('id_user');
        session()->forget('nama');
        session()->forget('akses_level');
        session()->forget('username');
        return redirect()->to('login')->with('sukses','Logout Berhasil');
    }
}
