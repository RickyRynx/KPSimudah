<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->isKetuaUKM()) {
            return redirect(RouteServiceProvider::HOME_KETUA_UKM);
        } elseif ($user->isPembina()) {
            return redirect(RouteServiceProvider::HOME_PEMBINA);
        } elseif ($user->isPelatih()) {
            return redirect(RouteServiceProvider::HOME_PELATIH);
        } elseif ($user->isAdminSimudah()) {
            return redirect(RouteServiceProvider::HOME_ADMIN_SIMUDAH);
        } elseif ($user->isAdminKeuangan()) {
            return redirect(RouteServiceProvider::HOME_ADMIN_KEUANGAN);
        } elseif ($user->isBidangKemahasiswaan()) {
            return redirect(RouteServiceProvider::HOME_BIDANG_KEMAHASISWAAN);
        } 

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->flush();

        $request->session()->regenerateToken();

        return redirect('/login')->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                                 ->header('Pragma', 'no-cache')
                                 ->header('Expires', '0');
    }
}
