<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import relasi
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendaraan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kendaraan';
    protected $primaryKey = 'id_jenis_kendaraan';
    protected $guarded = [];

}
