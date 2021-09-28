@extends('backoffice.layouts.dashboard')

@section('title', __('Proveedores'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Proveedor</div>
            <p class="card-category">Vista detallada del proveedor</p>{{$providers->proveedor }}</p>
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
                          <img src="{{ asset('/img/mask.png') }}" alt="image" class="avatar">
                          <h5 class="title mt-3">Proveedor: {{ $providers->proveedor }}</h5>
                        </a>
                        <p class="description">
                        NIT: {{ $providers->nit }} <br>
                        Contacto: {{ $providers->personacontacto }}<br>
                        Direccion: {{ $providers->direccion}} <br>
                        </p>
                      </div>
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="/admin/provider/{{$providers->idproveedor}}/edit"><button class="btn btn-sm btn-primary">Editar</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="{{route('admin.provider.index')}}">
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
