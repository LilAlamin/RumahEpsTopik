@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
@php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
@php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
@stack('css')
@yield('css')
@stop

{{-- @section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop --}}

@section('body')

<style>
@media (max-width: 800px) {
    .coverImage {
        height: 300px;
    }
    .form{
        margin-left: -11%;
    }
    .box{
        margin-top:-50%;
    }
}

</style>


<div class="container">
    <div class="row">
        <div class="col-md-4 coverImage" style="background: url('../img/backgound.png') no-repeat; padding:0px 0px; background-size:cover; background-position:center; height:680px;">
            <div class="text-center" style="margin-top:60%;">
                <img class="img-fluid w-75" src="{{asset('landingpage/img/icon/logo.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-8 form">
            <div style="margin-left:30%;">
                <div class="{{ $auth_type ?? 'login' }}-box">

                    {{-- Card Header --}}
                    @hasSection('auth_header')
                        <div>
                            <h3 class="card-title float-none text-center">
                                @yield('auth_header')
                            </h3>
                        </div>
                    @endif

                    {{-- Card Body --}}
                    <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        @yield('auth_body')
                    </div>

                    {{-- Card Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                            @yield('auth_footer')
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('adminlte_js')
@stack('js')
@yield('js')
@stop
