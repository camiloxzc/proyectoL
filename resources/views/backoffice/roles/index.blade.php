@extends('backoffice.layouts.dashboard')

@section('title', __('List Roles'))

@section('dashboard-content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Roles
                                {{ Form::open(['route' => 'admin.role.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                <div class="form-group">
                                    {{ Form::text('name', null, ['class' => 'form-control','wire:model' => 'search','placeholder' => 'Buscar']) }}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                                {{ Form::close() }}
                            </h4>
                            <p class="card-category">Lista de roles registrados</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-round btn-facebook">Añadir nuevo rol</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="role_table">
                                    <thead class="text-primary">
                                    <th class="text-center"> ID </th>
                                    <th class="text"> Nombre </th>
                                    <th class="text-center">Modulos</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td class="text-center col-1">{{ $role->id }}</td>
                                            <td >{{ $role->name }}</td>
                                            <td class="text-center col-6">
                                                @foreach ($idRol as $id => $modulo)
                                                    @if ($modulo->idRol == $role->id)
                                                    <label  class="badge  text-dark" >{{$modulo->module_name}}</label>
                                                    @endif
                                                @endforeach
                                                </td>
                                            <td class="text-center">
                                                @if($role->status == 1)
                                                        <a href="{{ route('admin.role.changeStatus', $role->id) }}" class="btn btn-sm btn-round btn-success">Activo<i
                                                        class="material-icons">check</i> </a>
                                                        @else
                                                        <a href="{{ route('admin.role.changeStatus', $role->id) }}" class="btn btn-sm btn-round btn-danger">Inactivo <i
                                                        class="material-icons">close</i> </a>
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                <!-- <label class="switch">
                                                    <input data-id="{{ $role->id }}" type="checkbox" class="toggle-class" href="{{ route('admin.role.changeStatus', $role->id) }}"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                    data-on="Active" data-off="Inactive" {{ $role->status ? 'checked' : ''}}>
                                                    <span class="slider round"></span>
                                                </label> -->

                                                <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-sm btn-round btn-info"> <i
                                                        class="material-icons">visibility</i> </a>
                                                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-round btn-warning"> <i
                                                        class="material-icons">edit</i> </a>
                                                <form action="{{ route('admin.role.destroy', $role->id) }}" method="post"
                                                      onsubmit="return confirm('Esta seguro?')" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="btn btn-sm btn-round btn-danger">
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
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                        </div>
                        <!--Footer-->
                        <div class="card-footer mr-auto">
                        </div>
                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#role_table').Database
        });
         $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:'/admin/role/changeStatus',
                    data:{"_token": "{{ csrf_token() }}",'status':status,'id':id},
                    success:function(data){
                        console.log(data.success);
                    }
             });
        });
    });

</script> -->
@endsection
