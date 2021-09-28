<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Models\Provider;
use App\Models\DetailShopping;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShoppingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:shopping')->only('index');
    //     $this->middleware('can:backoffice.shopping.create')->only('create');
    //     $this->middleware('can:backoffice.shopping.edit')->only('edit');
    //     $this->middleware('can:backoffice.shopping.destroy')->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::all();
        $shopping = Shopping::orderBy('idcompra','ASC')->paginate(8);
        return view('backoffice.shopping.index',compact('shopping', 'inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = Inventory::all();
        $detailShopping = DetailShopping::all();
        $providers = Provider::all();
        return view('backoffice.shopping.create', compact('providers', 'inventory', 'detailShopping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailShopping::create($request->all());
        Shopping::create($request->all());
        return redirect()->route('admin.shopping.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcompra)
    {
        $shopping = Shopping::find($idcompra);
        $detailShopping = DetailShopping::all();
        return view('backoffice.shopping.show',compact('shopping', 'detailShopping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idcompra)
    {
        $shopping = Shopping::find($idcompra);
        return view('backoffice.shopping.edit')->with('shopping', $shopping);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcompra)
    {
        $shopping = Shopping::find($idcompra);
        //Actualizar datos  de los atributos a editar
        $shopping->fecha = $request->fecha;
        $shopping->preciototal = $request->preciototal;
        $shopping->iva = $request->iva;
        $shopping->numerofactura = $request->numerofactura;
        $shopping->idproveedor = $request->idproveedor;

        $shopping->update();
        return redirect()->route('admin.shopping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        //abort_if(Gate::denies('delete shopping'), 403);

        // if (auth()->shopping()->idcompra == $shopping->idcompra) {
        //     return redirect()->route('shopping.index');
        // }

        // $shopping->delete();
        //return back()->with('succes', 'Compra eliminada correctamente');
        $shopping->delete();

        return redirect()->route('admin.shopping.index');
    }
}
