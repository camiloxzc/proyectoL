@extends('backoffice.layouts.auth')

@section('title', __('auth.login.title'))

@section('auth-content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
                <h3>@lang('auth.login.title')</h3>
            </div>
            <nav class="navbar navbar-expand-lg navbar-transparent  fixed-top text-black">
                <div class="container">

                    <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">
                            <i class="material-icons">person_add</i> Register
                        </a>
                        </li>
                        <li class="nav-item active">
                        <a href="{{route('login')}}" class="nav-link">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto ">
                <form class="form" method="POST" action="{{ route('login') }}" onsubmit="return confirm('¿Esta seguro de iniciar sesion?')" >
                    @csrf

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">
                                <strong>@lang('auth.login.description')</strong>
                            </h4>
                        </div>
                        <div class="card-body">
                            <p class="card-description text-center">
                                @lang('auth.login.subtitle')
                            </p>

                            <!--Username-->
                            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">face</i>
                  </span>
                                    </div>
                                    <input type="taxt" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('username', null) }}" required autocomplete="email" autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <div id="username-error" class="error text-danger pl-3" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}"  required autocomplete="current-password">
                                </div>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-check mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}"> {{ __('Remember me') }}
                                    <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Log in') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
