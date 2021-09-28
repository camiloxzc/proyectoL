<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function index(request $request)
    {
        $nombre  = $request->get('nombre');
    	$precio = $request->get('precio');

        $inventories = Inventory::where('idcategoria','1')  ->orderBy('idservicioproducto', 'ASC')
            ->nombre($nombre)
    		->precio($precio)
            ->paginate(10);

            return view('backoffice.products.index', compact('inventories'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('backoffice.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required|min:3',
            'idcategoria' => 'required',
            'estado' => 'required',
            'cantidad' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        Inventory::create($request->all());
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idservicioproducto)
    {
        $inventories = Inventory::find($idservicioproducto);
        return view('backoffice.products.show')->with('inventories',$inventories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request, $idservicioproducto)
    {
        $categories = Category::all();
        $inventories = Inventory::find($idservicioproducto);
        return view('backoffice.products.edit', compact('categories'))->with('inventories',$inventories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idservicioproducto)
    {
        $request->validate([
            'precio' => 'min:3'
        ]);

        $inventory = Inventory::find($idservicioproducto);
         //Actualizar datos  de los atributos a editar
         $inventory->nombre = $request->nombre;
         $inventory->descripcion = $request->descripcion;
         $inventory->precio = $request->precio;
         $inventory->cantidad = $request->cantidad;
         $inventory->estado = $request->estado;
         $inventory->idcategoria = $request->idcategoria;
         $inventory->update();

        return redirect()->route('admin.product.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idservicioproducto)
    {
        $idservicioproducto=Inventory::find($idservicioproducto);
        $idservicioproducto->delete();

        return back();
    }
    public function changeStatus(request $request,Inventory $product){
        // $notiupdate=Inventory::find($request->idservicioproducto)->update(['estado'=>$request->estado]);

        // if($request->estado == 0){
        //     $newstatus = '<br><button type="button" class="btn btn-sm btn-danger">Inactivo</button>';
        // }else{
        //     $newstatus = '<br><button type="button" class="btn btn-sm btn-success">Activo</button>';
        // }

        // return response()->json(['var'=>''.newstatus.'']);
        if($product->estado == '1'){
            $product->update(['estado'=>'0']);
            return redirect()->back();
        }else {
            $product->update(['estado'=>'1']);
            return redirect()->back();
        }
    }
}
