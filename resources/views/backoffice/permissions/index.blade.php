@extends('backoffice.layouts.dashboard')

@section('title', __('Permisos'))

@section('dashboard-content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permisos</h4>
                  <p class="card-category">Permisos registrados</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-right">
                      @can('backoffice.permission.create')
                      <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-round btn-facebook">Añadir permiso</a>
                      @endcan
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <th class="text-center col-xs-2">ID</th>
                        <th class="text-center col-xs-2">Nombre</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                          <td class="text-center col-xs-2">{{ $permission->id }}</td>
                          <td class="text-center col-xs-2">{{ $permission->name }}</td>
                          <td class="td-actions text-right">
                            <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-sm btn-round btn-info"><i
                                class="material-icons">person</i></a>
                            @can('backoffice.permission.edit')
                            <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-sm btn-round btn-warning"><i
                                class="material-icons">edit</i></a>
                            @endcan
                            @can('backoffice.permission.destroy')
                            <form action="{{ route('admin.permission.destroy', $permission->id) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-round btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">delete_forever</i>
                              </button>
                            </form>
                            @endcan
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

                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                {!! $permissions->total() !!} {{ trans_choice('user.index.table.total', $permissions->total()) }}
                            </div>
                        </div><!--col-->

                        <div class="col-5">
                            <div class="float-right">
                                {!! $permissions->render() !!}
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
