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
              <h4 class="card-title">Productos Asociados a la compra
              </h4>
              <p class="card-category">Detalle de productos asociados a la compra</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('admin.detailsproductshoppings.create') }}" class="btn btn-sm btn-facebook">Adicionar producto </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="products_table">
                  <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre de producto</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>IvA</th>
                    <th>Subtotal</th>
                    <th class="text-center">Acciones</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>shampoo</td>
                      <td>cabello</td>
                      <td>$$$$</td>
                      <td>#</td>
                      <td>$</td>
                      <td>$$$$</td>
                      <td>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a href="{{ route('admin.shopping.index') }}" class="btn btn-danger pull-right">
                  <i class="fa fa-arrow-circle-left"></i>
                    @lang('Volver')
                  </a>
                </div>
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