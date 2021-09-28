@extends('backoffice.layouts.app')

@section('content')
    {{-- Sidebar --}}
    @include('backoffice.includes.sidebar')

    {{-- Main panel --}}
    <div class="main-panel">
        {{-- Navbar --}}
        @include('backoffice.includes.nav')

        {{-- Content --}}
        <div class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @yield('dashboard-content')
            </div>
        </div>

        {{-- Footer --}}
        @include('backoffice.includes.footer')
    </div>
@endsection
