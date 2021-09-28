@extends('backoffice.layouts.dashboard')

@section('title', __('List Roles'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!--Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Vista detallada del rol {{$role->name}}</p>
          </div>
          <!--End header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <!-- first -->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">

                          <h5 class="title mt-3">Rol: {{ $role->name }}</h5>
                        </a>
                        <p class="description">
                          ID : {{ $role->id }} <br>
                          Estado :@if($role->status == 1)
                                <button type="button" id="btnActivo" class="btn btn-sm btn-round btn-success">Activo</button>
                            @else
                                <button type="button" id='btnInactivo' class="btn btn-sm btn-round btn-danger">Inactivo</button>
                            @endif<br>
                          Modulos:
                            @foreach ($idRol as $id => $modulo)
                            @if ($modulo->idRol == $role->id)
                            <label  class="badge text-dark " >{{$modulo->module_name}}</label>
                            @endif
                            @endforeach
                        </p>
                      </div>
                    </p>
                    <div class="card-description">

                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('admin.role.edit', $role->id) }}"><button type="submit" class="btn btn-sm btn-primary">Editar</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="{{route('admin.role.index')}}">
                  <i class="material-icons">close</i>Cancelar</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--end first-->
            </div>
            <!--end row-->
          </div>
          <!--End card body-->
        </div>
        <!--End card-->
      </div>
    </div>
  </div>
</div>
@endsection
