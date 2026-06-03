<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import relasi
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $guarded = [];

    // login
    public static function login($username, $password)
    {
        return self::where('username', $username)
            ->where('password', sha1($password))
            ->first();
    }
}
