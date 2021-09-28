@extends('backoffice.layouts.dashboard')

@section('title', __('list providers'))

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

         {{-- <div class="row">--}}
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Proveedores
                            {{ Form::open(['route' => 'admin.provider.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                <div class="form-group">
                                    {{ Form::text('buscar', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <span class="material-icons">search</span>
                                    <div class="ripple-container"></div>
                                    </button>
                                </div>
                            {{ Form::close() }}
                  </h4>
                  <p class="card-category">Proveedores registrados</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-right">
                     <a href="{{ route('admin.provider.create') }}" class="btn btn-round btn-sm btn-facebook">Añadir proveedor</a>
                   </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover " id="products_table">
                      <thead class="text-primary">
                        <th>ID</th>
                        <th>NIT</th>
                        <th>Proveedor</th>
                        <th>Contacto</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th class="text-center">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($providers as $provider)
                        <tr>
                          <td>{{ $provider->idproveedor }}</td>
                          <td>{{ $provider->nit }}</td>
                          <td>{{ $provider->proveedor}}</td>
                          <td>{{ $provider->personacontacto}}</td>
                          <td>{{ $provider->correo}}</td>
                          <td>{{ $provider->telefono}}</td>
                          <td>{{ $provider->direccion}}</td>
                          <td class="td-actions text-right">
                          <label class="switch">
                                <input data-id="" class="mi_checkbox" type="checkbox" data-onstyle="success"
                                 data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                 >
                                <span class="slider round"></span>
                            </label>
                            <a href="{{ route('admin.provider.show', $provider->idproveedor) }}" class="btn btn-sm btn-round btn-info"><i
                                class="material-icons">person</i></a>
                            <a href="{{ route('admin.provider.edit', $provider->idproveedor) }}" class="btn btn-sm btn-round btn-warning"><i
                                class="material-icons">edit</i></a>
                            <form action="{{ route('admin.provider.destroy', $provider->idproveedor) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-round btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">delete_forever</i>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
@endsection
