<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKendaraan;

class JenisKendaraanController extends Controller
{
    // index
    public function index()
    {
        // $jenisKendaraan = JenisKendaraan::orderBy('id_jenis_kendaraan','DESC')->get();
        $keywords   = $_GET['keywords'] ?? '';
        $jenisKendaraan       = JenisKendaraan::when($keywords, function ($query) use ($keywords) {
                            $query->where('nama_jenis_kendaraan', 'LIKE', "%{$keywords}%")
                                  ->orWhere('keterangan', 'LIKE', "%{$keywords}%")
                                  ->orWhere('durasi_parkir_gratis', 'LIKE', "%{$keywords}%")
                                  ->orWhere('durasi_parkir_harian', 'LIKE', "%{$keywords}%")
                                  ->orWhere('tarif_harian', 'LIKE', "%{$keywords}%")
                                  ->orWhere('tarif_perjam', 'LIKE', "%{$keywords}%");
                        })
                        ->orderBy('id_jenis_kendaraan', 'DESC')
                        ->get();

        $data = [   'title'             => 'Data Jenis Kendaraan ('.COUNT($jenisKendaraan).')',
                    'jenisKendaraan'    => $jenisKendaraan,
                    'content'           => 'admin/jenis-kendaraan/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_jenis_kendaraan)
    {
        $jenisKendaraan = JenisKendaraan::where('id_jenis_kendaraan',$id_jenis_kendaraan)->first();

        $data = [   'title'             => 'Edit Jenis Kendaraan: '.$jenisKendaraan->nama_jenis_kendaraan,
                    'jenisKendaraan'    => $jenisKendaraan,
                    'content'           => 'admin/jenis-kendaraan/edit'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // prosesTambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'nama_jenis_kendaraan'      => 'required|unique:jenis_kendaraan',
        ]);

        // Simpan ke Database
        JenisKendaraan::create([
            'nama_jenis_kendaraan'  => $request->nama_jenis_kendaraan,
            'keterangan'            => $request->keterangan,
            'status_default'        => $request->status_default,
            'urutan'                => $request->urutan,
            'durasi_parkir_gratis'  => $request->durasi_parkir_gratis,
            'durasi_parkir_harian'  => $request->durasi_parkir_harian,
            'tarif_perjam'          => $request->tarif_perjam,
            'tarif_harian'          => $request->tarif_harian,
            'created_by'            => session()->get('id_jenis_kendaraan') ?? 1,
            'updated_by'            => session()->get('id_jenis_kendaraan') ?? 1,
            'created_at'            => now()
        ]);

        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data user berhasil ditambahkan');
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'nama_jenis_kendaraan'           => 'required'
        ]);

        // Simpan ke Database
        JenisKendaraan::where(   'id_jenis_kendaraan',$request->id_jenis_kendaraan)->update([
                        'nama_jenis_kendaraan'  => $request->nama_jenis_kendaraan,
                        'keterangan'            => $request->keterangan,
                        'status_default'        => $request->status_default,
                        'urutan'                => $request->urutan,
                        'durasi_parkir_gratis'  => $request->durasi_parkir_gratis,
                        'durasi_parkir_harian'  => $request->durasi_parkir_harian,
                        'tarif_perjam'          => $request->tarif_perjam,
                        'tarif_harian'          => $request->tarif_harian,
                        'updated_by'            => session()->get('id_jenis_kendaraan') ?? 1,
                        'updated_at'            => now()
                    ]);
        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data user berhasil diupdate');
    }

    // delete
    public function delete($id_jenis_kendaraan)
    {
        JenisKendaraan::where(   'id_jenis_kendaraan',$id_jenis_kendaraan)->delete();
        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data user berhasil dihapus');
    }
}
