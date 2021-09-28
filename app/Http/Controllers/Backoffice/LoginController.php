<?php

namespace App\Http\Controllers\Backoffice;

use permission;

use Illuminate\Http\Request;
use App\Models\Modulo_vs_role;
use Illuminate\Http\JsonResponse;
use App\Models\Role_vs_permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    public function showLoginForm()
    {
        return view('backoffice.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $idRol = Auth::user()->idRol;
            $permisos = Role_vs_permission::join('permissions','permissions.id','=','role_vs_permisos.idPermiso')
                ->select('permissions.*')->where('role_vs_permisos.idRol','=',$idRol)->get();
            $modulos = Modulo_vs_role::join('modulos','modulos.id','=','modulo_vs_role.idModulo')
                ->select('modulos.*')->where('modulo_vs_role.idRol','=',$idRol)->get();
            session(["permisos"=>$permisos,'modulos'=>$modulos]);
            return redirect('/')->with('success','Sesión iniciada');
        }
        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    // protected function attemptLogin(Request $request)
    // {
    //     return $this->guard()->attempt(
    //         $this->credentials($request), $request->filled('remember')
    //     );
    // }

    // protected function credentials(Request $request)
    // {
    //     return $request->only($this->username(), 'password');
    // }

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);

    //     if ($response = $this->authenticated($request, $this->guard()->user())) {
    //         return $response;
    //     }

    //     return $request->wantsJson()
    //                 ? new JsonResponse([], 204)
    //                 : redirect()->intended($this->redirectPath());
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     //
    // }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        //$this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
    // use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
