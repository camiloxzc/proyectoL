@extends('backoffice.layouts.dashboard')

@section('title', 'User')

@section('dashboard-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">
                                    @lang('user.index.title')

                                    {{ Form::open(['route' => 'admin.user.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                        <div class="form-group">
                                            {{ Form::text('buscar', null, ['class' => 'form-control','wire:model' => 'search', 'placeholder' => 'Buscar']) }}
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                <span class="material-icons">search</span>
                                            </button>
                                        </div>
                                    {{ Form::close() }}
                                </h4>

                                <p class="card-category">@lang('user.index.subtitle')</p>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-round btn-sm btn-facebook ">Crear usuario</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" id="products_table">
                                        <thead class="text-primary">
                                        <th>ID</th>
                                        <th>nombre</th>
                                        <th>email</th>
                                        <th>roles</th>
                                        <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $user->phone}}</td>

                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-sm btn-round btn-info"><i
                                                            class="material-icons">visibility</i></a>
                                                       <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-round btn-warning"><i
                                                            class="material-icons">edit</i></a>
                                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                                <div class="row">
                                    <div class="col-7">
                                        <div class="float-left">
                                            {!! $users->total() !!} {{ trans_choice('user.index.table.total', $users->total()) }}
                                        </div>
                                    </div><!--col-->

                                    <div class="col-5">
                                        <div class="float-right">
                                            {!! $users->render() !!}
                                        </div>
                                    </div><!--col-->
                                </div><!--row-->
                            </div>
                            {{--<div class="card-footer flex">
                              {{ $users->render() }}
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
