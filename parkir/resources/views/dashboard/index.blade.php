@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-voilet">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="mb-0 text-white">0  </h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="fas fa-bicycle"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Parkir Sepeda</p>
                    </div>
                    <div class="ml-auto font-14 text-white"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-primary-blue">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="mb-0 text-white">0 </h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="fas fa-motorcycle"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Parkir Motor </p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-rose">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="mb-0 text-white">0  </h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-car"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Parkir Mobil</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-sunset">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="mb-0 text-white">0  </h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-bus"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Parkir Bus </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<div class="row">
    <div class="col-12 col-lg-12 d-flex align-items-stretch">
        <div class="card radius-15 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Pendapatan</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-lg-6">
                        <div class="card radius-15 mx-0">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-secondary mb-0">Pendapatan Harian</p>
                                        <h4 class="mb-0 ">0</h4>
                                    </div>
                                    <div id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-15 mx-0">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-secondary mb-0">Pendapatan Keseluruhan</p>
                                        <h4 class="mb-0">0</h4>
                                    </div>
                                    <div id="chart5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-15 mx-0 mb-3 mb-md-0">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-secondary mb-0">Total Parkir Harian</p>
                                        <h4 class="mb-0">0</h4>
                                    </div>
                                    <div id="chart6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-15 mx-0 mb-0">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-secondary mb-0">Total Parkir Keseluruhan</p>
                                        <h4 class="mb-0">0</h4>
                                    </div>
                                    <div id="chart7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->


@endsection
