@extends('backoffice.layouts.dashboard')

@section('title', __('Proveedores'))

@section('dashboard-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('admin.provider.store')}}" method="post" class="form-horizontal"  onsubmit="return  confirm('¿Esta seguro de gusradar el proveedor?')">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Registrar Proveedor</h4>
              <p class="card-category">Ingresar datos del proveedor</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="nit" class="col-sm-2 col-form-label"><span class="text-danger">*</span> NIT</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nit" id="nit" placeholder="Ingrese nit " autofocus onkeyup="onlyNumbers(this)" value="{{ old('nit') }}">
                  @if ($errors->has('nit'))
                  <span class="error text-danger" for="input-nit">{{ $errors->first('nit') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                <label for="proveedor" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Proveedor</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="proveedor" placeholder="Ingrese el proveedor" onkeyup="onlyLetters(this)" value="{{ old('proveedor') }}">
                  @if ($errors->has('proveedor'))
                  <span class="error text-danger" for="input-proveedor">{{ $errors->first('proveedor') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="personacontacto" class="col-sm-2 col-form-label"><span class="text-danger">*</span>Nombre de contacto</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="personacontacto" placeholder="Ingrese el nombre de contacto" onkeyup="onlyLetters(this)" value="{{ old('personacontacto') }}">
                  @if ($errors->has('personacontacto'))
                  <span class="error text-danger" for="input-personacontacto">{{ $errors->first('personacontacto') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="correo" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="correo" placeholder="Ingrese el correo" value="{{ old('correo') }}">
                  @if ($errors->has('correo'))
                  <span class="error text-danger" for="input-correo">{{ $errors->first('correo') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="telefono" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Telefono</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="telefono" placeholder="Ingrese el numero de telefono" onkeyup="onlyNumbers(this)" maxlength="10" value="{{ old('telefono') }}">
                  @if ($errors->has('telefono'))
                  <span class="error text-danger" for="input-telefono">{{ $errors->first('telefono') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="direccion" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Direccion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="direccion" placeholder="Ingrese direccion" value="{{ old('direccion') }}">
                  @if ($errors->has('direccion'))
                  <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.provider.index')}}">
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
@push('after-scripts')
<script src="{{ asset('js/validations.js') }}"></script>
@endpush