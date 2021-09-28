@extends('backoffice.layouts.dashboard')

@section('title', __('list shopping'))

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
              <h4 class="card-title">Compras
                {{ Form::open(['route' => 'admin.shopping.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group">
                  {{ Form::text('nombre', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <span class="material-icons">search</span>
                    <div class="ripple-container"></div>
                  </button>
                </div>
                {{ Form::close() }}
              </h4>
              <p class="card-category">Compras registradas</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('admin.shopping.create') }}" class="btn btn-sm btn-round btn-facebook">Añadir compra</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="products_table">
                  <thead class="text-primary">
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th># Factura</th>
                    <th>Total Compra</th>
                    <th class="text-center">Opciones</th>
                  </thead>
                  <tbody>
                    @forelse ($shopping as $shopping)
                    <tr>
                      <td>{{ $shopping->idcompra }}</td>
                      <td>{{ $shopping->proveedor_id }}</td>
                      <td>{{ $shopping->fecha }}</td>
                      <td>{{ $shopping->numerofactura}}</td>
                      <td>{{ $shopping->preciototal}}</td>
                      <td class="td-actions text-right">.
                        <a href="{{ route('admin.shopping.show', $shopping->idcompra) }}" class="btn btn-sm btn-round btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('admin.shopping.edit', $shopping->idcompra) }}" class="btn btn-sm btn-round btn-warning"><i class="material-icons">edit</i></a>
                        <form action="{{ route('admin.shopping.destroy', $shopping->idcompra) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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