<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Role;
use App\Models\Modulo;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Modulo_vs_role;
use App\Models\Role_vs_permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:role')->only('index');
    //     $this->middleware('can:backoffice.role.create')->only('create');
    //     $this->middleware('can:backoffice.role.edit')->only('edit');
    //     $this->middleware('can:backoffice.role.destroy')->only('destroy');
    // }

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function index(request $request)
    {
        //
        $name = $request->get('name');
        $id = $request->get('id');

        $roles = Role::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'ASC')
        ->name($name)
        ->id($id)
        ->paginate();

        $idRol = Modulo_vs_role::join('roles','modulo_vs_role.idRol','=','roles.id')
        ->join('modulos','modulo_vs_role.idModulo','=','modulos.id')
        ->select('modulos.module_name','modulo_vs_role.idRol')->get();
        // dd($idRol);

        return view('backoffice.roles.index', compact('roles','idRol'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
        $role = Role::all();
        $permissions = Permission::all();
        $modulos = Modulo::all();

        return view('backoffice.roles.create', compact('permissions','role', 'modulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);
        $modulos = Modulo::all();
        $permissions = Permission::all();
        foreach ($request->modulo as $modulo) {
            Modulo_vs_role::create([ 'idRol' => $role->id,'idModulo' => $modulo]);
        }
        foreach ($request->permission as $permission) {
            Role_vs_permission::create([ 'idRol' => $role->id,'idPermiso' => $permission]);
        }

        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $idRol = Modulo_vs_role::join('roles','modulo_vs_role.idRol','=','roles.id')
        ->join('modulos','modulo_vs_role.idModulo','=','modulos.id')
        ->select('modulos.module_name','modulo_vs_role.idRol')->get();
        $role->all();
        return view('backoffice.roles.show', compact('role','idRol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        $role=Role::findorFail($id);
        $modulos = Modulo::all();
        $permissions = Permission::get();
        $rolePermission = Role_vs_permission::select('*')->where('idRol','=',$role->id)->get();
        $roleModulo = Modulo_vs_role::select('*')->where('idRol','=',$role->id)->get();
        // dd($rolePermissions);
    return view('backoffice.roles.edit', compact('role','permissions', 'modulos','rolePermission','roleModulo'));
    }

    public static function consulta_role_vs_permisos($idPermiso,$idRol){
        $rolePermission = Role_vs_permission::select('idPermiso')->where('idPermiso','=',$idPermiso)
        ->where('idRol','=',$idRol)->get()->toArray();
        return $rolePermission;
    }

    public static function consulta_modulo_vs_role($idModulo,$idRol){
        $roleModulo = Modulo_vs_role::select('idModulo')->where('idModulo','=',$idModulo)
        ->where('idRol','=',$idRol)->get()->toArray();
        return $roleModulo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|min:3|max:30'
        ]);
        $role = Role::findOrFail($request->id);
        $modulos = Modulo::all();
        $permissions = Permission::all();
        $rolePermissions = Role_vs_permission::select('*')->where('idRol','=',$role->id)
        ->get();
        $roleModulos = Modulo_vs_role::select('*')->where('idRol','=',$role->id)
        ->get();
        if ($role == null)
            return redirect(route('admin.role.index'))->withErrors('No se encontró el error');

        try {
            DB::beginTransaction();
            $role->update([
                'status' => $request->status,
                'name' => $request->name
            ]);

            foreach($rolePermissions as $rolePermission){
                $rolePermission->delete();
            }
            foreach($roleModulos as $roleModulo){
                $roleModulo->delete();
            }

            foreach ($request->modulo as $modulo) {
                Modulo_vs_role::create([ 'idRol' => $role->id,'idModulo' => $modulo]);
            }
            foreach ($request->permission as $permission) {
                Role_vs_permission::create([ 'idRol' => $role->id,'idPermiso' => $permission]);
            }

            DB::commit();
            return redirect()->route('admin.role.index')->with('success','Cambio satisfactorio');

        }
        catch(Exception $e) {
            DB::rollBack;
            return redirect()->route('admin.role.index')->withErrors('Ocurrio un error inesperado:' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();

        return redirect()->route('admin.role.index');
    }
    public function changeStatus(request $request,Role $role){
        if($role->status == '1'){
            $role->update(['status'=>'0']);
            return redirect()->back();
        }else {
            $role->update(['status'=>'1']);
            return redirect()->back();
        }
    }
}
