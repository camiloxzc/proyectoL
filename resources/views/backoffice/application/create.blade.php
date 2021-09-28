@extends('backoffice.layouts.dashboard')

@section('title', __('list application'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('admin.application.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Solicitud</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}

              <div class="row">
                <label for="fechaservicio" class="col-sm-2 col-form-label">Fecha Servicio</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fechaservicio">
                  @if ($errors->has('fechaservicio'))
                    <span class="error text-danger" for="input-fechaservicio">{{ $errors->first('fechaservicio') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                  <label class="col-sm-2 col-form-label">@lang('Precio')</label>
                  <div class="col-md-7">
                    <select class="form-control" data-style="btn btn-link" name="precio">
                        <option>Precio del Servicio</option>
                        @foreach ($precios as $precio)
                        <option name="precio-{{ $precio }}" data-precio-id="{{ $precio->precio }}" value="{{ $precio->precio }}">{!! $precio->precio !!}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('$precios'))
                        <span class="error text-danger" for="input-users">{{ $errors->first('$precios') }}</span>
                    @endif
                  </div>
              </div>

              <div class="row">
                  <label class="col-sm-2 col-form-label">@lang('Usuario')</label>
                  <div class="col-md-7">
                    <select class="form-control" data-style="btn btn-link" name="idusuario">
                        <option>Seleccione el usuario</option>
                        @foreach ($users as $id => $user)
                          <option name="user-{{ $id }}" data-user-id="{{ $user->id }}" value="{{ $user->id }}">{!! $user->name !!}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('users'))
                        <span class="error text-danger" for="input-users">{{ $errors->first('users') }}</span>
                    @endif
                  </div>
                </div>
              </div>

                <!-- <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a data-toggle="modal" href="#myModal">
                        <button id="btnAgregarArt" type="button" class="btn btn-primary" ><span class="fa fa-plus"></span> Añadir Productos</button>
                    </a>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#C378CD">
                            <tr>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="cajaDetalle">

                        </tbody>
                    </table>
                </div> -->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.application.index')}}">
                  <i class="material-icons">close</i>Cancelar</a>
            </div>
            <!--End footer-->

                <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                        <h4 class="modal-title">Seleccione un Producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        </div>
                        <div class="modal-body table-responsive">
                            <table id="tblproducts" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>

                                </thead>
                                <tbody>


                                </tbody>
                                <tfoot>
                                @foreach ($precios as $precio)
                                <th>{{ $precio -> idservicioproducto }}</th>
                                <th>{{ $precio -> nombre }}</th>
                                <th>{{ '$ '.number_format($precio->precio,0,"'",".") }}</th>

                                    <td class="sorting_1">
                                        <button class="btn btn-warning" onclick="agregarDetalle(1,'Mouse inalámbrico Genius NX-7010')">
                                    <span class="fa fa-plus"></span></button></td>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin modal -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
