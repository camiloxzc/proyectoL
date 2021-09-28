@extends('backoffice.layouts.dashboard')

@section('title', __('list products'), '')

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

         {{-- <div class="row">--}}
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Productos
                            {{ Form::open(['route' => 'admin.product.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                <div class="form-group">
                                    {{ Form::text('nombre', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <span class="material-icons">search</span>
                                    <div class="ripple-container"></div>
                                    </button>
                                </div>
                            {{ Form::close() }}
                  </h4>
                  <p class="card-category">Productos registrados</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-right">
                       <a href="{{ route('admin.product.create') }}" class="btn btn-round btn-sm btn-facebook">Añadir producto</a>
                   </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped" id="products_table">
                      <thead class="text-primary">
                        <th class="text-center p-2">ID</th>
                        <th class="text">Nombre</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Estado</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($inventories as $inventory)
                        <tr>
                          <td class="text-center">{{ $inventory->idservicioproducto }}</td>
                          <td>{{ $inventory->nombre }}</td>
                          <td class="text-center">{{ $inventory->descripcion}}</td>
                          <td class="text-center">{{ $inventory->cantidad}}</td>
                          <td class="text-center">{{'$ '.number_format($inventory->precio,0,"'",".")}}</td>
                            <td class="text-center"id="resp{{ $inventory->idservicioproducto }}">
                                 @if($inventory->idcategoria == 1)
                            <button type="button" id="btnActivo" class="btn btn-sm btn-round btn-default">Producto</button>
                            @endif
                            </td>
                          <td class="text-center" id="resp{{ $inventory->idservicioproducto }}">
                            @if($inventory->estado == 1)
                                <a href="{{ route('admin.product.changeStatus', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-success">Activo<i
                                   class="material-icons">check</i> </a>
                                   @else
                                <a href="{{ route('admin.product.changeStatus', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-danger">Inactivo <i
                                   class="material-icons">close</i> </a>
                            @endif

                        </td>
                          <td class="td-actions text-right">
                          <!-- <label class="switch">
                                <input data-id="{{ $inventory->idservicioproducto }}" class="mi_checkbox" type="checkbox" data-onstyle="success"
                                 data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                 {{ $inventory->estado ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label> -->
                            <a href="{{ route('admin.product.show', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-info"><i
                                class="material-icons">visibility</i></a>
                            <a href="{{ route('admin.product.edit', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-warning"><i
                                class="material-icons">edit</i></a>
                            <form action="{{ route('admin.product.destroy', $inventory->idservicioproducto) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-round btn-danger" type="submit" rel="tooltip">
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
                <div class="card-footer">

                </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

 <script type="text/javascript">
    $(document).ready(function() {
        $('#products_table').Database
        });
        $(function() {
            $('.mi_checkbox').change(function() {
            //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
            var estado = $(this).prop('checked') == true ? 1 : 0;
            var idservicioproducto = $(this).attr("data-id");
                console.log(estado);

        $.ajax({
            type: "POST",
            dataType: "json",
            //url: '',
            url: '/admin/inventory/changeStatus',
            data: {"_token": "{{ csrf_token() }}",'estado': estado, 'idservicioproducto': idservicioproducto},
            success: function(data){
                $('#resp' + idservicioproducto).html(data.var);
                console.log(data)

            }
        });
    });

});

</script>
@endsection
