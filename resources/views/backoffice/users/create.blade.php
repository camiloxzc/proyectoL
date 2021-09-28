@extends('backoffice.layouts.dashboard')

@section('title', 'Create User')

@section('dashboard-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-category">Complete your profile</p>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('admin.user.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">@lang('name')</label>

                                            <input type="text" name="name" class="form-control">

                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">@lang('email')</label>

                                            <input type="email" name="email" class="form-control">

                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">@lang('password')</label>

                                            <input type="password" name="password" class="form-control">

                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">@lang('phone')</label>

                                            <input type="text" name="phone" class="form-control">

                                            @if ($errors->has('phone'))
                                                <span id="phone-error" class="error text-danger">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label for="idRol" class="bmd-label-floating">@lang('roles')</label>

                                            <select class="form-control" data-style="btn btn-link" name="idRol">
                                                <option >Seleccion el rol</option>
                                                @foreach ($roles as $id => $role)
                                                    @if ($role->name !== 'SuperAdministrador')
                                                        <option data-role-id="{{ $role->id }}" name="idRol" value="{{$role->id}}">{!! $role->name !!}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('roles'))
                                                <span class="error text-danger" for="input-role">{{ $errors->first('roles') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card-footer ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('admin.user.index')}}">
                                            <i class="material-icons">close</i>Cancelar</a>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        $(document).ready(function(){
            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    console.log(data);
                });
            });
        });
    </script> -->
@endsection
