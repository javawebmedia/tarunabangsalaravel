<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class AkunController extends Controller
{
    // index
    public function index()
    {
        $user = Users::where('id_user',session()->get('id_user'))->first();

        $data = [   'title'     => 'Akun Saya',
                    'user'      => $user,
                    'content'   => 'admin/akun/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'nama'           => 'required',
            'username'       => 'required',
            'password'       => 'required',
            'email'          => 'required|email',
        ]);

        // Simpan ke Database
        $password = $request->password;
        if(strlen($password) >= 6 && strlen($password) <= 32) {
            Users::where(   'id_user',$request->id_user)->update([
                            'nama'              => $request->nama,
                            'email'             => $request->email,
                            'password'          => sha1($request->password),
                            'updated_by'        => session()->get('id_user') ?? 1,
                            'updated_at'        => now()
                        ]);
        }else{
            Users::where(   'id_user',$request->id_user)->update([
                            'nama'              => $request->nama,
                            'email'             => $request->email,
                            'updated_by'        => session()->get('id_user') ?? 1,
                            'updated_at'        => now()
                        ]);
        }
        return redirect('admin/akun')->with('sukses', 'Data berhasil diupdate');
    }
}
