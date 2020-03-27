<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; //memanggil class Auth (jangan lupa daftarin di Kernel.php)

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // mengecek apakah ADMIN yg login
        if(Auth::user() && Auth::user()->roles == 'ADMIN'){
            return $next($request);
        }
        //jika bukan admin masuk ke halaman home mulananda tour
        return redirect('/');
    }
}
