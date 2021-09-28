@extends('backoffice.layouts.dashboard')

@section('title', __('list providers'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Productos o Servicios</div>
            <p class="card-category">Vista detallada del producto {{ $inventories->nombre }}</p>
          </div>
          <!--body-->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#">
                          <!-- <img src="{{ asset('/img/mask.png') }}" alt="image" class="avatar"> -->
                          <h5 class="title mt-3">Nombre del producto: {{ $inventories->nombre }}</h5>
                        </a>
                        <p class="description">
                        Precio: {{'$ '.number_format($inventories->precio,0,"'",".")}} <br>
                        Descripción:{{ $inventories->descripcion }}<br>
                            Stock: {{ $inventories->cantidad}} Unidades <br>
                            Estado: @if($inventories->estado == 1)
                                <button type="button" id="btnActivo" class="btn btn-sm btn-round btn-success">Activo</button>
                            @else
                                <button type="button" id='btnInactivo' class="btn btn-sm btn-round btn-danger">Inactivo</button>
                            @endif

                        </p>
                      </div>
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{route('admin.product.edit',$inventories)}}"><button class="btn btn-sm btn-primary">Editar</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="{{route('admin.product.index')}}">
                  <i class="material-icons">close</i>Cancelar</a>
                    </div>
                  </div>
                </div>
              </div><!--end card user-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
