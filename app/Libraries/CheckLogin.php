<?php
namespace App\Libraries;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Jika belum login
        if ($request->session()->get('username')=='') {
            return redirect('login')->with('warning', 'Anda belum login atau sesi Anda telah berakhir.');
        }
        // Jika status user non aktif
        return $next($request);
    }
}
