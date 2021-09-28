<?php

namespace App\Http\Controllers\Backoffice;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Contracts\Foundation\Application;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:user')->only('index');
    //     $this->middleware('can:backoffice.user.create')->only('create');
    //     $this->middleware('can:backoffice.user.edit')->only('edit');
    //     $this->middleware('can:backoffice.user.destroy')->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index( Request $request)
    {
        $buscar = trim($request->get('buscar'));
        $permiso = Permission::all();
        $users = User::select('id', 'name', 'phone', 'email', 'password')
            ->where('name', 'LIKE', '%' . $buscar . '%')
            ->orWhere('id', 'LIKE', '%' . $buscar . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('backoffice.users.index', compact('users', 'buscar','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        // if($request->ajax()){
        //     $roles = Role::where('id', $request->role_id)->first();
        //     $permissions = $roles->permissions;

        //     return $permissions;
        // }
        $roles = Role::all();

        return view('backoffice.users.create')->with(['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|between:6,255',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'idRol' => $request->input('idRol'),
            'password' => Hash::make($request->input('password')),
        ]);
        // if($request->role != null){
        //     $user->roles()->attach($request->role);
        //     $user->save();
        // }

        // $user->syncRoles($request->input('roles')[]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('backoffice.users.show', compact('user'));
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        return view('backoffice.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->update();

        $user->roles()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->update();
        }

        return redirect()->route('admin.user.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        // abort_if(Gate::denies('delete user'), 403);

        // if (auth()->user()->id == $user->id) {
        //     $user->destroy();
        //     return redirect()->route('admin.user.index');
        // }


        $user->delete();

        return back()->with('succes', 'Usuario eliminado correctamente');
    }
}
