<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\JenisKendaraan;
use App\Models\PintuParkir;
use App\Models\Parkir;

class ParkirController extends Controller
{
    // index
    public function index(Request $request)
    {
        $JenisKendaraan = JenisKendaraan::listing();
        $PintuMasuk     = PintuParkir::jenis('Masuk');
        $PintuKeluar    = PintuParkir::jenis('Keluar');
        $status_bayar   = $request->get('status_bayar', 'Semua');
        $tanggal_masuk  = $request->filled('tanggal_masuk') ? $request->tanggal_masuk . ' 00:00:00' : 'Semua';
        $tanggal_keluar = $request->filled('tanggal_keluar') ? $request->tanggal_keluar . ' 23:59:59' : 'Semua';
        $keywords       = $request->get('keywords', '');
        $dataParkir     = Parkir::listing($tanggal_masuk,$tanggal_keluar,$status_bayar,$keywords);

        $data = [
            'title'             => 'Data Parkir',
            'JenisKendaraan'    => $JenisKendaraan,
            'PintuMasuk'        => $PintuMasuk,
            'PintuKeluar'       => $PintuKeluar,
            'dataParkir'        => $dataParkir,
            // untuk mempertahankan filter di form
            'status_bayar'      => $status_bayar,
            'tanggal_masuk'     => $request->tanggal_masuk,
            'tanggal_keluar'    => $request->tanggal_keluar,
            'keywords'          => $keywords,
            'content'           => 'admin/parkir/index'
        ];

        return view('admin.layout.wrapper', $data);
    }

    // prosesTambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'id_jenis_kendaraan' => 'required|integer',
            'id_pintu_parkir'    => 'required|integer',
            'nomor_polisi'       => 'nullable|string|max:20',
            'tanggal_masuk'      => 'required|date',
            'jam_masuk'          => 'required',
        ]);

        $kode_parkir    = strtoupper(Str::random(8));
        $tanggal_masuk  = $request->tanggal_masuk . ' ' . $request->jam_masuk;
        $tanggal_keluar = $tanggal_masuk;

        Parkir::create([
            'id_jenis_kendaraan'  => $request->id_jenis_kendaraan,
            'id_pintu_parkir'     => $request->id_pintu_parkir,
            'kode_parkir'         => strtoupper($kode_parkir),
            'nomor_polisi'        => strtoupper(str_replace(' ', '', $request->nomor_polisi)),
            'tanggal_masuk'       => $tanggal_masuk,
            'tanggal_keluar'      => $tanggal_keluar,
            'status_bayar'        => 'Menunggu',
            'keterangan'            => $request->keterangan,
            'created_by'          => session()->get('id_user') ?? 1,
        ]);

        return redirect('admin/parkir')->with('sukses', 'Data berhasil ditambahkan');
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'id_parkir'           => 'required|integer',
            'id_jenis_kendaraan'  => 'required|integer',
            'id_pintu_keluar'     => 'required|integer',
            'tanggal_masuk'       => 'required|date',
            'jam_masuk'           => 'required',
            'tanggal_keluar'      => 'required|date',
            'jam_keluar'          => 'required',
        ]);

        $tanggal_masuk  = $request->tanggal_masuk . ' ' . $request->jam_masuk;
        $tanggal_keluar = $request->tanggal_keluar . ' ' . $request->jam_keluar;
        $masuk          = Carbon::parse($tanggal_masuk);
        $keluar         = Carbon::parse($tanggal_keluar);
        $selisih        = $masuk->diff($keluar);
        $durasi_hari    = $selisih->days;
        $durasi_jam     = ($selisih->days * 24) + $selisih->h;
        $durasi_menit   = $selisih->i;
        $tarif          = JenisKendaraan::findOrFail($request->id_jenis_kendaraan);

        if (
            $durasi_jam < 1 &&
            $durasi_menit <= $tarif->durasi_parkir_gratis
        ) {

            $harga_harian = 0;
            $harga_perjam = 0;
            $total_bayar = 0;

        } elseif (
            $durasi_hari <= 1 &&
            $durasi_jam <= $tarif->durasi_parkir_harian
        ) {

            $harga_harian = $tarif->tarif_harian;
            $harga_perjam = $tarif->tarif_perjam;

            $total_bayar =
                ($durasi_hari * $tarif->tarif_harian) +
                ($durasi_jam * $tarif->tarif_perjam);

        } elseif (
            $durasi_hari >= 1 &&
            $durasi_jam > $tarif->durasi_parkir_harian
        ) {

            $harga_harian = $tarif->tarif_harian;
            $harga_perjam = $tarif->tarif_perjam;

            $total_bayar =
                ($durasi_hari * $tarif->tarif_harian) +
                ($tarif->durasi_parkir_harian * $tarif->tarif_perjam);

        } else {

            $harga_harian = $tarif->tarif_harian;
            $harga_perjam = $tarif->tarif_perjam;

            $total_bayar =
                $durasi_jam * $tarif->tarif_perjam;
        }

        $parkir = Parkir::findOrFail($request->id_parkir);

        $parkir->update([
            'id_jenis_kendaraan'  => $request->id_jenis_kendaraan,
            'id_pintu_keluar'     => $request->id_pintu_keluar,
            'tanggal_masuk'       => $tanggal_masuk,
            'tanggal_keluar'      => $tanggal_keluar,
            'durasi_hari'         => $durasi_hari,
            'durasi_jam'          => $durasi_jam,
            'durasi_menit'        => $durasi_menit,
            'harga_harian'        => $harga_harian,
            'harga_perjam'        => $harga_perjam,
            'total_bayar'         => $total_bayar,
            'status_bayar'        => 'Sudah',
            'keterangan'            => $request->keterangan,
            'updated_by'          => session()->get('id_user') ?? 1,
        ]);

        return redirect('admin/parkir')->with('sukses', 'Data berhasil diupdate');
    }

    // delete
    public function delete($id_parkir)
    {
        Parkir::where('id_parkir',$id_parkir)->delete();
        return redirect('admin/parkir')->with('sukses', 'Data berhasil dihapus');
    }
}
