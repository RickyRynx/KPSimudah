<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                if ($user->isAdmin()) {
                    return redirect()->route('adminSimudah.dashboard.index');
                } elseif ($user->isPembina()) {
                    return redirect()->route('pembina.dashboard.index');
                } elseif ($user->isPelatih()) {
                    return redirect()->route('pelatih.dashboard.index');
                } elseif ($user->isBidangKemahasiswaan()) {
                    return redirect()->route('wakilRektorIII.dashboard.index');
                } elseif ($user->isAdminKeuangan()) {
                    return redirect()->route('adminKeuangan.dashboard.index');
                } elseif ($user->isKetuaUKM()) {
                    return redirect()->route('ketuaUKM.dashboard.index');
                } else {
                    // Pengguna tidak memiliki peran yang valid
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Invalid role.');
                }
            }
        }

        return $next($request);
    }
}

