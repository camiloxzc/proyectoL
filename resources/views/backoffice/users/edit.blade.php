@extends('backoffice.layouts.dashboard')

@section('title', 'Edit User')

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
                            <form method="post" action="{{ route('admin.user.update', $user) }}">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">@lang('email')</label>

                                            <input type="text" name="email" class="form-control" value="{!! $user->email !!}">

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

                                            <input type="password" name="password" class="form-control" value="{!! $user->password !!}">

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
                                            <label class="bmd-label-floating">@lang('name')</label>

                                            <input type="text" name="name" class="form-control" value="{!! $user->name !!}">

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
                                            <label class="bmd-label-floating">@lang('phone')</label>

                                            <input type="text" name="phone" class="form-control" value="{!! $user->phone !!}">

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
                                            <label for="role" class="bmd-label-floating">@lang('roles')</label>

                                            <select class="form-control" data-style="btn btn-link" name="role">
                                                <option>Seleccion el rol</option>
                                                @foreach ($roles as $id => $role)
                                                    @if ($role->name !== 'super-admin')
                                                        <option data-role-id="{{ $role->id }}" name="role-{{ $id }}" value="{{ $role->id }}">{!! $role->name !!}</option>
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
@endsection
