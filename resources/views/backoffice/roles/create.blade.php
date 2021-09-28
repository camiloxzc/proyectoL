@extends('backoffice.layouts.dashboard')

@section('title', __('List Roles'))

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/multicheck.css') }}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('admin.role.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Crear Rol</h4>
              <p class="card-category">Ingresar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="name" placeholder="Ingrese nombre del rol" autocomplete="off" autofocus>
                    @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="status" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                  <select class="form-control " name="status" data-style="btn btn-link" id="status">
                      <option class="form-control" value="">Seleccione el estado del producto</option>
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
                            <label for="name" class="col-12 col-form-label">Modulos</label>
                            <div class="container">
                                <div class="p-2">
                                    <div class="content">
                                        <input type="checkbox" id="option-all" onchange="checkAll(this)">
                                        <label for="option-all">Select All</label><br>
                                    @foreach ($modulos as $modulo)
                                        <input type="checkbox" value="{{$modulo->id}}" name="modulo[]">
                                        <label for="{{$modulo->id}}" style="color:#120A4B">{{$modulo->module_name}}</label><br>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col">
                            <label for="name" class="col-12 col-form-label">Permisos</label>
                            <div class="container">
                                <div class="p-2">
                                    <input type="checkbox" id="option-all" onchange="checkAll2(this)">
                                    <label for="option-all">Select All</label><br>
                                    @foreach ($permissions as $permission)
                                    <input class="" type="checkbox" value="{{$permission->id}}" name="permission[]">
                                    <label class="" style="color:#120A4B">{{$permission->description}}</label><br>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>




            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.role.index')}}">
                  <i class="material-icons">close</i>Cancelar</a>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- <script>
var checkboxes = document.querySelectorAll("input[name = 'modulo[]'");
function checkAll(myCheckbox){
    if(myCheckbox.checked == true){
        checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
</script> -->
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
</script>
<script>
    var expanded = false;
    function showCheckboxes1() {
        var checkboxes = document.getElementById("checkboxes1");
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
