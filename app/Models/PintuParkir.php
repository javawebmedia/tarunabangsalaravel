<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import relasi
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PintuParkir extends Model
{
    use HasFactory;

    protected $table = 'pintu_parkir';
    protected $primaryKey = 'id_pintu_parkir';
    protected $guarded = [];

    // jenis
    public static function jenis($jenis_pintu)
    {
        return self::orderBy('nama_pintu_parkir', 'ASC')->where('jenis_pintu',$jenis_pintu)->get();
    }

}
