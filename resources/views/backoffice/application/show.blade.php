@extends('backoffice.layouts.dashboard')

@section('title', __('list application'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Solicitud</div>
            <p class="card-category">Vista detallada del producto {{ $applications->direccion}}</p>
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
                          <h5 class="title mt-3">Producto: {{ $applications->idsolicitudservicio }}</h5>
                        </a>
                        <p class="description">
                        {{ $applications->precio }} <br>
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                       Lorem .
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{route('admin.application.edit',$applications->idsolicitudservicio)}}"><button class="btn btn-sm btn-primary">Editar</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="{{route('admin.application.index')}}">
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
