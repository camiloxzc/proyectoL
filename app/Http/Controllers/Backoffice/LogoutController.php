<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if(Auth::check() != null) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();

            return redirect('/admin/dashboard');
        };

    }
}
