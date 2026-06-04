<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    // index
    public function index()
    {
        // $user = Users::orderBy('id_user','DESC')->get();
        $keywords   = $_GET['keywords'] ?? '';
        $user       = Users::when($keywords, function ($query) use ($keywords) {
                            $query->where('nama', 'LIKE', "%{$keywords}%")
                                  ->orWhere('username', 'LIKE', "%{$keywords}%")
                                  ->orWhere('email', 'LIKE', "%{$keywords}%");
                        })
                        ->orderBy('id_user', 'DESC')
                        ->get();

        $data = [   'title'     => 'Data Pengguna Sistem ('.COUNT($user).')',
                    'user'      => $user,
                    'content'   => 'admin/user/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_user)
    {
        $user = Users::where('id_user',$id_user)->first();

        $data = [   'title'     => 'Edit Pengguna Sistem: '.$user->nama,
                    'user'      => $user,
                    'content'   => 'admin/user/edit'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // prosesTambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'nama'           => 'required',
            'username'       => 'required|unique:users',
            'password'       => 'required',
            'email'          => 'required|email|unique:users',
        ]);

        // Simpan ke Database
        Users::create([
            'nama'              => $request->nama,
            'email'             => $request->email,
            'username'          => $request->username,
            'password'          => sha1($request->password),
            'akses_level'       => $request->akses_level,
            'created_by'        => session()->get('id_user') ?? 1,
            'updated_by'        => session()->get('id_user') ?? 1,
            'created_at'        => now()
        ]);

        return redirect('admin/user')->with('sukses', 'Data berhasil ditambahkan');
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
                            'username'          => $request->username,
                            'password'          => sha1($request->password),
                            'akses_level'       => $request->akses_level,
                            'updated_by'        => session()->get('id_user') ?? 1,
                            'updated_at'        => now()
                        ]);
        }else{
            Users::where(   'id_user',$request->id_user)->update([
                            'nama'              => $request->nama,
                            'email'             => $request->email,
                            'username'          => $request->username,
                            'akses_level'       => $request->akses_level,
                            'updated_by'        => session()->get('id_user') ?? 1,
                            'updated_at'        => now()
                        ]);
        }
        return redirect('admin/user')->with('sukses', 'Data berhasil diupdate');
    }

    // delete
    public function delete($id_user)
    {
        Users::where(   'id_user',$id_user)->delete();
        return redirect('admin/user')->with('sukses', 'Data berhasil dihapus');
    }
}
