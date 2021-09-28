@extends('backoffice.layouts.dashboard')

@section('title', __('list application'))

@section('dashboard-content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                <h4 class="card-title">
                      {{ Form::open(['route' => '', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                    <div class="form-group">
                      {{ Form::text('buscar', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <span class="material-icons">search</span>
                      </button>
                      </div>
                       {{ Form::close() }}
                </h4>

                  <h4 class="card-title">Solicitudes</h4>
                  <p class="card-category">Solicitudes Servicios</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="#" class="btn btn-sm btn-round btn-facebook">Añadir solicitud</a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <th>ID</th>
                        <th>Fecha Servicio</th>
                        <th>Precio</th>
                        <th class="text-center">Usuarios</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($application as $application)
                        <tr>
                          <td>{{ $application->idsolicitudservicio }}</td>
                          <td>{{ $application->fechaservicio}}</td>
                          <td>{{'$ '.number_format($application->precio,0,"'",".")}}</td>

                          <!-- Para que muestre el nombre del usuario y no el ID -->
                          <td class="text-center">
                            @forelse ($users as $user)
                              <span class="badge badge-info">{{ $user->name }}</span>
                            @empty
                              <span class="badge badge-danger">No tiene permisos</span>
                            @endforelse
                        </td>


                          <td class="td-actions text-right">
                            <a href="{{ route('', ) }}" class="btn btn-info"><i
                                class="material-icons">visibility</i></a>
                            <a href="{{ route('', ) }}" class="btn btn-warning"><i
                                class="material-icons">edit</i></a>
                            <form action="{{ route('',) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" rel="tooltip">
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
                <div class="card-footer mr-auto">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
