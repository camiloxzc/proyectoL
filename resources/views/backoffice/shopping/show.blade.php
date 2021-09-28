@extends('backoffice.layouts.dashboard')

@section('title', __('list shopping'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-primary">
            <div class="card-title">DETALLE DE COMPRA</div>
            <p class="card-category">Vista detallada de la compra con ID: {{ $shopping->idcompra }}</p>
          </div>
          <!--body-->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-user">

                  <div class="row ">
                    <label for="proveedor_id" class="col-auto col-form-label ">Id Compra</label>
                    <div class="col-sm-7 ">
                      <input type="text" class="border border-white " value="{{ $shopping->idcompra }}" readonly>
                    </div>
                  </div>


                  <div class="row ">
                    <label for="proveedor_id" class="col-sm-2 col-form-label">Proveedor</label>
                    <div class="col-sm-7 ">
                      <input type="text" class="border border-white" value="{{ $shopping->proveedor_id }}" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <label for="numerofactura" class="col-sm-3 col-form-label">numero de factura</label>
                    <div class="col-sm-auto ">
                      <input type="text" class="border border-white" value="{{ $shopping->numerofactura }}" readonly>
                    </div>
                  </div>

                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                      <thead style="background-color:#C378CD">
                        <tr>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th>Cantidad</th>
                          <th>IVA</th>
                          <th>Subtotal</th>
                          <th>Precio Total</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="cajaDetalle">

                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('admin.shopping.edit', $shopping) }}"><button class="btn btn-sm btn-primary">Editar</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="{{route('admin.shopping.index')}}">
                        <i class="material-icons">close</i>Cancelar</a>
                    </div>
                  </div>

                </div>
              </div>
              <!--end card user-->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection