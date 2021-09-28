@extends('backoffice.layouts.dashboard')

@section('title', __('List Roles'))

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/multicheck.css') }}">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('admin.role.update', $role->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar rol</h4>
              <p class="card-category">Editar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="status" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                  <select class="form-control " name="status" data-style="btn btn-link" id="status">
                      <option class="form-control" value="0">Seleccione el estado del producto</option>
                      <option value="1" >Activo</option>
                      <option value="0">Inactivo</option>
                  </select>
                  @if ($errors->has('status'))
                    <span class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                            <label for="name" class="col-12 bmd-label-floating">Modulos</label>
                            <div class="container">
                                <div class="p-2">
                                    <div class="content">
                                        <input type="checkbox" id="option-all" onchange="checkAll(this)">
                                        <label for="option-all">Select All</label><br>
                                    @foreach ($modulos as $modulo)
                                        @php
                                            $roleModulo = App\Http\Controllers\RoleController::consulta_modulo_vs_role($modulo->id,$role->id);
                                        @endphp
                                        @if (count($roleModulo) > 0)
                                            <input type="checkbox" value="{{$modulo->id}}" name="modulo[]" {{$modulo->id == $roleModulo[0]["idModulo"] ? 'checked' :''}}><label class="p-2" for="{{$modulo->id}}" style="color:#120A4B">{{$modulo->module_name}}</label><br>
                                        @else
                                            <input type="checkbox" value="{{$modulo->id}}" name="modulo[]"><label class="p-2" for="{{$modulo->id}}" style="color:#120A4B">{{ $modulo->module_name}}</label><br>
                                        @endif


                                    @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col">
                            <label for="name" class="col-12 bmd-label-floating">Permisos</label>
                            <div class="container">
                                <div class="p-2">
                                    <input type="checkbox" id="option-all" onchange="checkAll2(this)">
                                    <label for="option-all">Select All</label><br>
                                    @foreach ($permissions as $permission)
                                        @php
                                            $rolePermission = \App\Http\Controllers\RoleController::consulta_role_vs_permisos($permission->id,$role->id);
                                        @endphp
                                        @if (count($rolePermission) > 0)
                                                <input class="" type="checkbox" value="{{$permission->id}}" name="permission[]" {{$permission->id == $rolePermission[0]["idPermiso"] ? 'checked' : ''}}><label class="p-2" style="color:#120A4B">{{$permission->description}}</label><br>
                                        @else
                                                <input class="" type="checkbox" value="{{$permission->id}}" name="permission[]"><label class="p-2" style="color:#120A4B">{{ $permission->description}}</label><br>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>

             <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.role.index')}}">
                  <i class="material-icons">close</i>Cancelar</a>
            </div>
            <!--End body-->
            <!--Footer-->
          </div>
          <div class="card">
            <!--Header-->

            <!--End header-->
            <!--Body-->

            <!--End body-->
            <!--Footer-->
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- <script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        }else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script> -->
@endsection
