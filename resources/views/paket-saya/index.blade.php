@extends('adminlte::page')

<!-- @section('title', 'RUKO') -->

@section('content')

<style>
    html,body{
        overflow-x: hidden; 
    }
</style>
<div class="text-center mb-5">
    <div class="container">
        <div>
            <img style="border-radius: 10px;" class="img-fluid w-75" src="{{ asset('img/banner.png') }}" alt="">
        </div>
    </div>
</div>

<div style="padding-bottom: 100px; margin: 0px" class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <div class="w-100 max-w-1000">
                <div class="text-center mb-3">
                    <h3 class="font-weight-bold" style="color: #263B5E">Paket Saya</h3>
                    <a style="" target="_blank" href="https://forms.gle/KcqGk3TEhnHXJa6b7" class="btn alert-default-primary btn-sm"><i class="fas fa-fw fa-file-alt"></i><strong>Klik untuk mengisi testimoni</strong></a>
                </div>
                {{-- <div style="margin-left: 90px" class="col-lg-3 col-md-12">
                    <div style="" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-search"></i></span>
                        </div>
                        <select name="filter_paket[]" id="filter-paket" class="form-control select2">
                            <option value="semua-topik">Semua Topik</option>
                            @foreach($topiks as $topik)
                            <option value="{{ $topik->id }}">{{ $topik->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                
                <div class="row d-flex justify-content-center" id="component-list-paket">
                    @include('paket-saya.component-list-paket')
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('footer')
    @include('adminlte::partials.footer.footer')
@endsection

@section('js')
<script src="{{ asset('js/paket-saya.js') }}"></script>
@stop
