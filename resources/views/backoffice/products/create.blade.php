@extends('backoffice.layouts.dashboard')

@section('title', __('list products'))

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/multicheck.css') }}">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('admin.product.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Producto</h4>
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
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del producto" onkeyup="only(this)" autofocus>
                  @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                </div>
            </div>
            <div class="row">
              <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una descripcion">
                @if ($errors->has('descripcion'))
                <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                @endif
                </div>
              </div>
              <div class="row">
                <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="precio" placeholder="Ingrese el precio" onkeyup="onlyNumbers(this)">
                  @if ($errors->has('precio'))
                    <span class="error text-danger" for="input-precio">{{ $errors->first('precio') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="cantidad" placeholder="Ingrese cantidad" onkeyup="onlyNumbers(this)" >
                  @if ($errors->has('cantidad'))
                    <span class="error text-danger" for="input-cantidad">{{ $errors->first('cantidad') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-7">
                  <select class="form-control " name="estado" data-style="btn btn-link" id="estado">
                      <option class="form-control" value="">Seleccione el estado del producto</option>
                      <option value="1" >Activo</option>
                      <option value="0">Inactivo</option>
                  </select>
                  @if ($errors->has('estado'))
                    <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="categoria_id" class="col-sm-2 col-form-label">Categoría</label>
                <div class="col-sm-7">
                    <select name="idcategoria" id="idcategoria" class="form-control ">
                        <option class="form-control" value="">Seleccione la categoría</option>
                        @foreach ($categories as $categories)
                            <option class="form-control" autofocus value="{{ $categories['idcategoria'] }}">{{ $categories['nombre'] }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('idcategoria'))
                    <span class="error text-danger" for="input-idcategoria">{{ $errors->first('idcategoria') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                {{--<label for="roles" class="col-sm-2 col-form-label">Roles</label>--}}
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active">
                               {{-- <table class="table">
                                    <tbody>
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                            value="{{ $id }}"
                                                            >
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                            {{ $role }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.product.index')}}">
                <i class="material-icons">close</i>Cancelar</a>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
  function onlyNumbers(objeto) {
    objeto.value = objeto.value.replace(/[^\d,]/g, '');
  }

  function only(objeto) {
    objeto.value = objeto.value.replace(/^[\d]/g, '');
  }

</script>
