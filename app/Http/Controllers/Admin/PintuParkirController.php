<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PintuParkir;

class PintuParkirController extends Controller
{
    // index
    public function index()
    {
        // $pintuParkir = PintuParkir::orderBy('id_pintu_parkir','DESC')->get();
        $keywords   = $_GET['keywords'] ?? '';
        $pintuParkir       = PintuParkir::when($keywords, function ($query) use ($keywords) {
                            $query->where('nama_pintu_parkir', 'LIKE', "%{$keywords}%")
                                  ->orWhere('keterangan', 'LIKE', "%{$keywords}%")
                                  ->orWhere('nama_jenis_pintu', 'LIKE', "%{$keywords}%");
                        })
                        ->orderBy('id_pintu_parkir', 'DESC')
                        ->get();

        $data = [   'title'         => 'Data Pintu Parkir ('.COUNT($pintuParkir).')',
                    'pintuParkir'   => $pintuParkir,
                    'content'       => 'admin/pintu-parkir/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_pintu_parkir)
    {
        $pintuParkir = PintuParkir::where('id_pintu_parkir',$id_pintu_parkir)->first();

        $data = [   'title'             => 'Edit Pintu Parkir: '.$pintuParkir->nama_pintu_parkir,
                    'pintuParkir'    => $pintuParkir,
                    'content'           => 'admin/pintu-parkir/edit'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // prosesTambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'nama_pintu_parkir'      => 'required|unique:pintu_parkir',
        ]);

        // Simpan ke Database
        PintuParkir::create([
            'nama_pintu_parkir'     => $request->nama_pintu_parkir,
            'keterangan'            => $request->keterangan,
            'jenis_pintu'           => $request->jenis_pintu,
            'urutan'                => $request->urutan,
            'created_by'            => session()->get('id_user') ?? 1,
            'updated_by'            => session()->get('id_user') ?? 1,
            'created_at'            => now()
        ]);

        return redirect('admin/pintu-parkir')->with('sukses', 'Data berhasil ditambahkan');
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'nama_pintu_parkir'           => 'required'
        ]);

        // Simpan ke Database
        PintuParkir::where(   'id_pintu_parkir',$request->id_pintu_parkir)->update([
                        'nama_pintu_parkir'     => $request->nama_pintu_parkir,
                        'keterangan'            => $request->keterangan,
                        'jenis_pintu'           => $request->jenis_pintu,
                        'urutan'                => $request->urutan,
                        'updated_by'            => session()->get('id_user') ?? 1,
                        'updated_at'            => now()
                    ]);
        return redirect('admin/pintu-parkir')->with('sukses', 'Data berhasil diupdate');
    }

    // delete
    public function delete($id_pintu_parkir)
    {
        PintuParkir::where(   'id_pintu_parkir',$id_pintu_parkir)->delete();
        return redirect('admin/pintu-parkir')->with('sukses', 'Data berhasil dihapus');
    }
}
