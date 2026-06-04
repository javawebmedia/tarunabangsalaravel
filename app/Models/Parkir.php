<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\JenisKendaraan;
use App\Models\PintuParkir;
use App\Models\Users;

class Parkir extends Model
{
    use HasFactory;

    protected $table = 'parkir';
    protected $primaryKey = 'id_parkir';
    protected $guarded = [];

    public static function listing($tanggal_masuk = 'Semua',$tanggal_keluar = 'Semua',$status_bayar = 'Semua',$keywords = ''
    ) 
    {
        return self::with([
                'jenisKendaraan',
                'pintuParkir',
                'pintuKeluar'
            ])
            ->when($tanggal_masuk != 'Semua', function ($query) use ($tanggal_masuk) {
                $query->where('tanggal_masuk', '>=', $tanggal_masuk);
            })
            ->when($tanggal_keluar != 'Semua', function ($query) use ($tanggal_keluar) {
                $query->where('tanggal_keluar', '<=', $tanggal_keluar);
            })
            ->when($status_bayar != 'Semua', function ($query) use ($status_bayar) {
                $query->where('status_bayar', $status_bayar);
            })
            ->when($keywords != '', function ($query) use ($keywords) {
                $query->where(function ($q) use ($keywords) {
                    $q->where('kode_parkir', 'LIKE', "%{$keywords}%")
                      ->orWhere('nomor_polisi', 'LIKE', "%{$keywords}%")
                      ->orWhereHas('jenisKendaraan', function ($q2) use ($keywords) {
                          $q2->where(
                              'nama_jenis_kendaraan',
                              'LIKE',
                              "%{$keywords}%"
                          );
                      })
                      ->orWhereHas('pintuParkir', function ($q2) use ($keywords) {
                          $q2->where(
                              'nama_pintu_parkir',
                              'LIKE',
                              "%{$keywords}%"
                          );
                      })
                      ->orWhereHas('pintuKeluar', function ($q2) use ($keywords) {
                          $q2->where(
                              'nama_pintu_parkir',
                              'LIKE',
                              "%{$keywords}%"
                          );
                      });
                });
            })
            ->orderByDesc('id_parkir')
            ->paginate(500);
    }

    /**
     * Relasi ke Jenis Kendaraan
     * parkir.id_jenis_kendaraan = jenis_kendaraan.id_jenis_kendaraan
     */
    public function jenisKendaraan(): BelongsTo
    {
        return $this->belongsTo(
            JenisKendaraan::class,
            'id_jenis_kendaraan',
            'id_jenis_kendaraan'
        );
    }

    /**
     * Relasi ke Pintu Parkir
     * parkir.id_pintu_parkir = pintu_parkir.id_pintu_parkir
     */
    public function pintuParkir(): BelongsTo
    {
        return $this->belongsTo(
            PintuParkir::class,
            'id_pintu_parkir',
            'id_pintu_parkir'
        );
    }

    public function pintuKeluar(): BelongsTo
    {
        return $this->belongsTo(
            PintuParkir::class,
            'id_pintu_keluar',
            'id_pintu_parkir'
        );
    }

    /**
     * User yang membuat data
     * parkir.created_by = users.id_user
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(
            Users::class,
            'created_by',
            'id_user'
        );
    }

    /**
     * User yang mengubah data
     * parkir.updated_by = users.id_user
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(
            Users::class,
            'updated_by',
            'id_user'
        );
    }
}