<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Inventory;


class ApplicationController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:application')->only('index');
    //     $this->middleware('can:backoffice.application.create')->only('create');
    //     $this->middleware('can:backoffice.application.edit')->only('edit');
    //     $this->middleware('can:backoffice.application.destroy')->only('destroy');
    // }

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre  = $request->get('nombre');
    	$precio = $request->get('precio');

        $users = User::all();
        $application = Application::paginate(8);

        return view('backoffice.application.index', compact('application','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $precios = Inventory::all();
        return view('backoffice.application.create', compact('users','precios')); //Para foraneas de precio y usuario
        //->with(['users' => $users]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Application::create($request->all());
        return redirect()->route('admin.application.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idsolicitudservicio)
    {
        $applications = Application::find($idsolicitudservicio);
        return view('backoffice.application.show')->with('applications',$applications);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idsolicitudservicio)
    {
        $application = Application::find($idsolicitudservicio);
        return view('backoffice.application.edit')->with('application',$application);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idsolicitudservicio)
    {
            //Buscar registro de la tabla
             $application = Application::find($idsolicitudservicio);
             //Actualizar datos  de los atributos a editar
             $application->fechaservicio = $request->fechaservicio;
             $application->precio = $request->precio;
             $application->idestadoservicio = $request->idestadoservicio;
             $application->idusuario = $request->idusuario;
             $application->update();

            return redirect()->route('admin.application.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idsolicitudservicio)
    {
        $application=Application::find($idsolicitudservicio);
        $application->delete();

        return back();
    }
}
