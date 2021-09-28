<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProviderEditRequest;

class ProviderController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:provider')->only('index');
    //     $this->middleware('can:backoffice.provider.create')->only('create');
    //     $this->middleware('can:backoffice.provider.edit')->only('edit');
    //     $this->middleware('can:backoffice.provider.destroy')->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $buscar = trim($request->get('buscar'));
        $providers = DB::table('providers')
            ->select('idproveedor', 'nit', 'proveedor', 'personacontacto', 'correo', 'telefono', 'direccion')
            ->where('idproveedor', 'LIKE', '%' . $buscar . '%')
            ->orWhere('nit', 'LIKE', '%' . $buscar . '%')
            ->orWhere('proveedor', 'LIKE', '%' . $buscar . '%')
            ->orWhere('personacontacto', 'LIKE', '%' . $buscar . '%')
            ->orWhere('correo', 'LIKE', '%' . $buscar . '%')
            ->orWhere('telefono', 'LIKE', '%' . $buscar . '%')
            ->orWhere('direccion', 'LIKE', '%' . $buscar . '%')
            ->orderBy('idproveedor', 'asc')
            ->paginate(10);
        return view('backoffice.providers.index', compact('providers', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backoffice.providers.create');
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
            'nit' => 'required',
            'proveedor' => 'required',
            'personacontacto' => 'required',
            'correo' => 'required|email|unique:providers',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);
        Provider::create($request->all());
        return redirect()->route('admin.provider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproveedor)
    {
        //
        $providers = Provider::find($idproveedor);
        return view('backoffice.providers.show')->with('providers', $providers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idproveedor)
    {
        //
        $providers = Provider::findorFail($idproveedor);
        return view('backoffice.providers.edit')->with('providers', $providers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ProviderEditRequest $request, $idproveedor)
    {
        //
        $providers = Provider::find($idproveedor);
        //Actualizar datos  de los atributos a editar
        $providers->nit = $request->nit;
        $providers->proveedor = $request->proveedor;
        $providers->personacontacto = $request->personacontacto;
        $providers->correo = $request->correo;
        $providers->telefono = $request->telefono;
        $providers->direccion = $request->direccion;
        $providers->update();

        return redirect()->route('admin.provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproveedor)
    {
        //
        $providers = Provider::find($idproveedor);
        $providers->delete();

        return back();
    }
}
