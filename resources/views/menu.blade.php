@extends('layouts.homeLayout')

@section('content')

    
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Menu</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        {{-- for pizza --}}
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Pizza</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        {{-- put for each here --}}
                        @foreach ($pizzas as $pizza)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{$pizza->image}}" alt="">
                                    </div>
                                    <a class="d-block h5 mb-1 " href="">
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="{{ route('food-detail', $pizza->id ) }}">
                                                {{$pizza->name}}
                                            </a>
                                            <a class="d-block h6 mb-2 description" href="">
                                                {{$pizza->desc}}
                                            </a>
                                            <div class="mt-3 p-3 border-top">
                                                <a class="d-block h6 mb-2" href="">
                                                    {{$pizza->price}}
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- for appetizer --}}
        <div class="container mt-3">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Appetizer</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        {{-- put for each here --}}
                        @foreach ($appetizers as $ap)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{$ap->image}}" alt="">
                                    </div>
                                    <a class="d-block h5 mb-1 " href="">
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="{{ route('food-detail', $ap->id ) }}">
                                                {{$ap->name}}
                                            </a>
                                            <a class="d-block h6 mb-2 description" href="">
                                                {{$ap->desc}}
                                            </a>
                                            <div class="mt-3 p-3 border-top">
                                                <a class="d-block h6 mb-2" href="">
                                                    {{$ap->price}}
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- for drink --}}
        <div class="container mt-3">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Drink</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        {{-- put for each here --}}
                        @foreach ($drinks as $drink)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{$drink->image}}" alt="">
                                    </div>
                                    <a class="d-block h5 mb-1 " href="">
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="{{ route('food-detail', $drink->id ) }}">
                                                {{$drink->name}}
                                            </a>
                                            <a class="d-block h6 mb-2 description" href="">
                                                {{$drink->desc}}
                                            </a>
                                            <div class="mt-3 p-3 border-top">
                                                <a class="d-block h6 mb-2" href="">
                                                    {{$drink->price}}
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
            <a class="btn btn-primary rounded-pill py-3 px-5" href="/viewcart">View Cart</a>
        </div>


    </div>
    <!-- Product End -->
    
@endsection
