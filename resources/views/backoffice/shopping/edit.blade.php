@extends('backoffice.layouts.dashboard')

@section('title', __('list shopping'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('admin.shopping.update', $shopping) }}" method="post" class="form-horizontal">
          @csrf
          @METHOD('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Compra</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
               @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha" placeholder="Ingrese fecha " value="{{ $shopping->fecha }}"  autofocus>
                  @if ($errors->has('fecha'))
                    <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="preciototal" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="preciototal" placeholder="Ingrese precio" value="{{ $shopping->preciototal }}">
                  @if ($errors->has('preciototal'))
                    <span class="error text-danger" for="input-preciototal">{{ $errors->first('preciototal') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="iva" class="col-sm-2 col-form-label">IVA</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="iva" placeholder="Ingrese el iva" value="{{ $shopping->iva }}">
                  @if ($errors->has('iva'))
                    <span class="error text-danger" for="input-iva">{{ $errors->first('iva') }}</span>
                  @endif
                </div>
              </div>
              {{--<div class="row">
                <label for="idproveedor" class="col-sm-2 col-form-label">Proveedor</label>
                <div class="col-sm-7 form-group">
                    <select name="idproveedor" id="idproveedor" class="form-control selectpicker">
                        <option class="form-control" value="">Seleccione la categoría</option>
                        @foreach ($proveedor as $proveedor)
                            <option class="form-control" autofocus value="{{ $proveedor['idproveedor'] }}">{{ $proveedor['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
              </div>--}}
              <div class="row">
            </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.shopping.index')}}">
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
