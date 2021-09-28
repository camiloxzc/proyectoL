    @extends('backoffice.layouts.dashboard')

    @section('title', __('list service'), '')

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
                                    <h4 class="card-title">Servicios
                                        {{ Form::open(['route' => 'admin.service.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                        <div class="form-group">
                                            {{ Form::text('buscar', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                <span class="material-icons">search</span>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                        {{ Form::close() }}
                                    </h4>
                                    <p class="card-category">Servicios registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                                <a href="{{ route('admin.service.create') }}" class="btn btn-round btn-sm btn-facebook">Añadir Servicio</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped" id="services_table">
                                            <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <!--<th>Cantidad</th>-->
                                            <th>Precio</th>
                                            <th>Categoría</th>
                                            <th>Estado</th>
                                            <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @forelse ($inventories as $inventory)
                                                <tr>
                                                    <td>{{ $inventory->idservicioproducto }}</td>
                                                    <td>{{ $inventory->nombre }}</td>
                                                    <td>{{ $inventory->descripcion}}</td>
                                                    <!--<td>{{ $inventory->cantidad}}</td>-->
                                                    <td>{{'$ '.number_format($inventory->precio,0,"'",".")}}</td>
                                                    <td id="resp{{ $inventory->idservicioproducto }}">
                                                        @if($inventory->idcategoria == 2)
                                                            <button type="button" id="btnActivo" class="btn btn-sm btn-round btn-default" >Servicio</button>
                                                        @endif
                                                    </td>
                                                    <td  id="resp{{ $inventory->idservicioproducto }}">
                                                        @if($inventory->estado == 1)
                                                            <a href="{{ route('admin.service.changeStatus', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-success">Activo <i
                                                                    class="material-icons">check</i> </a>
                                                        @else
                                                            <a href="{{ route('admin.service.changeStatus', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-danger">Inactivo <i
                                                                    class="material-icons">close</i> </a>
                                                        @endif

                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('admin.service.show', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-info"><i
                                                                class="material-icons">visibility</i></a>
                                                            <a href="{{ route('admin.service.edit', $inventory->idservicioproducto) }}" class="btn btn-sm btn-round btn-warning"><i
                                                                    class="material-icons">edit</i></a>
                                                            <form action="{{ route('admin.service.destroy', $inventory->idservicioproducto) }}" method="POST"
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

    @endsection
