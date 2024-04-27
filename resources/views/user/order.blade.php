@extends('layouts.userLayout')

@section('content')
<style>
.box_shadow {
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    padding: 10px;
    margin-bottom: 10px;
}
</style>    

    <div class="container-xl px-4 mt-4" style="height: auto; margin-bottom: 50px ">
            <div class="row">
                <div class="col-12 mb-2">
                    <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
                    <a href="" class="text-danger"> CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12  px-2">
                    {{-- cart food section --}}
                    {{-- for each for each order here --}}
                    <div class="cart-food box_shadow">
                        <div class="row mx-2 mt-4 mb-2">
                            <div class="col-lg-6">
                                <h4 class="mb-4">
                                    Order No. 
                                </h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <h4 class="mb-4 ">
                                    {{-- @if (session()->has('cart'))
                                        {{ count(session('cart')) }} item{{ count(session('cart')) > 1 ? 's' : '' }}
                                    @else
                                        @endif --}}
                                    Total : 5 items..
                                </h4>
                            </div>
                        </div>
                        <div class="title-table mb-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <span>PRODUCT DETAILS</span>
                                </div>
                                <div class="col-lg-2  text-center">
                                    <span class="ps-5">
                                        PRICE
                                    </span>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <span>
                                        QUANTITY
                                    </span>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <span>
                                        TOTAL
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- each product in Cart --}}
                        {{-- for each food --}}
                        @php
                        $total = 0;
                        $subTotal = 0;
                        @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php
                        $subTotal += $details['price'] * $details['quantity'];
                        $total += $details['price'] * $details['quantity'];
                        @endphp
                        <div class="product-cart">
                            <div class="row mb-3 border-1 border-bottom pe-3" style="height: auto; width: 97%; margin:auto">
                                <div class="col-lg-2 col-md-2" >
                                    <img class="img-fluid px-auto" src="{{ $details['food_image'] }}" alt="" style="height: 100px; padding-left: 40px;">
                                </div>
                                <div class="col-lg-10 col-md-10 ">
                                    <div class="row p-0 mr-0">
                                        <div class="col-lg-5">
                                            <div class="row p-3 ps-0">
                                                <div class="col-lg-12">
                                                    <h4 class="m-0">{{ $details['food_name'] }} </h4>
                                                </div>
                                                <div class="col-lg-12 mt-1">
                                                    <p>Size: Medium   ,   Crust Type: Thick</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-0" style="width: 100px">${{ $details['price'] }}</div>
                                        <div class="col-lg-3 d-flex ps-5">
                                            <p>{{ $details['quantity'] }}</p>
                                        </div>
                                        <div class="col-lg-1 px-4" style="">${{ $details['price'] * $details['quantity'] }}</div>
                                        <div class="col-lg-1 ps-5" style="width: ">
                                            <a class="action-icon d-block remove_product_via_cart" style="cursor: pointer;" data-product="34830" data-vendor_id="42">
                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- end for each food --}}

                        {{-- order total --}}

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end pe-5">
                                <p>Total : $ .......</p>
                            </div>
                        </div>


                    </div>
                    <div class="cart-food box_shadow">
                        <div class="row mx-2 mt-4 mb-2">
                            <div class="col-lg-6">
                                <h4 class="mb-4">
                                    Order No. 
                                </h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <h4 class="mb-4 ">
                                    {{-- @if (session()->has('cart'))
                                        {{ count(session('cart')) }} item{{ count(session('cart')) > 1 ? 's' : '' }}
                                    @else
                                        @endif --}}
                                    Total : 5 items..
                                </h4>
                            </div>
                        </div>
                        <div class="title-table mb-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <span>PRODUCT DETAILS</span>
                                </div>
                                <div class="col-lg-2  text-center">
                                    <span class="ps-5">
                                        PRICE
                                    </span>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <span>
                                        QUANTITY
                                    </span>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <span>
                                        TOTAL
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- each product in Cart --}}
                        {{-- for each food --}}
                        @php
                        $total = 0;
                        $subTotal = 0;
                        @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php
                        $subTotal += $details['price'] * $details['quantity'];
                        $total += $details['price'] * $details['quantity'];
                        @endphp
                        <div class="product-cart">
                            <div class="row mb-3 border-1 border-bottom pe-3" style="height: auto; width: 97%; margin:auto">
                                <div class="col-lg-2 col-md-2" >
                                    <img class="img-fluid px-auto" src="{{ $details['food_image'] }}" alt="" style="height: 100px; padding-left: 40px;">
                                </div>
                                <div class="col-lg-10 col-md-10 ">
                                    <div class="row p-0 mr-0">
                                        <div class="col-lg-5">
                                            <div class="row p-3 ps-0">
                                                <div class="col-lg-12">
                                                    <h4 class="m-0">{{ $details['food_name'] }} </h4>
                                                </div>
                                                <div class="col-lg-12 mt-1">
                                                    <p>Size: Medium   ,   Crust Type: Thick</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-0" style="width: 100px">${{ $details['price'] }}</div>
                                        <div class="col-lg-3 d-flex ps-5">
                                            <p>{{ $details['quantity'] }}</p>
                                        </div>
                                        <div class="col-lg-1 px-4" style="">${{ $details['price'] * $details['quantity'] }}</div>
                                        <div class="col-lg-1 ps-5" style="width: ">
                                            <a class="action-icon d-block remove_product_via_cart" style="cursor: pointer;" data-product="34830" data-vendor_id="42">
                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- end for each food --}}

                        {{-- order total --}}

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end pe-5">
                                <p>Total : $ .......</p>
                            </div>
                        </div>


                    </div>
                    <div class="cart-food box_shadow">
                        <div class="row mx-2 mt-4 mb-2">
                            <div class="col-lg-6">
                                <h4 class="mb-4">
                                    Order No. 
                                </h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <h4 class="mb-4 ">
                                    {{-- @if (session()->has('cart'))
                                        {{ count(session('cart')) }} item{{ count(session('cart')) > 1 ? 's' : '' }}
                                    @else
                                        @endif --}}
                                    Total : 5 items..
                                </h4>
                            </div>
                        </div>
                        <div class="title-table mb-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <span>PRODUCT DETAILS</span>
                                </div>
                                <div class="col-lg-2  text-center">
                                    <span class="ps-5">
                                        PRICE
                                    </span>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <span>
                                        QUANTITY
                                    </span>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <span>
                                        TOTAL
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- each product in Cart --}}
                        {{-- for each food --}}
                        @php
                        $total = 0;
                        $subTotal = 0;
                        @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php
                        $subTotal += $details['price'] * $details['quantity'];
                        $total += $details['price'] * $details['quantity'];
                        @endphp
                        <div class="product-cart">
                            <div class="row mb-3 border-1 border-bottom pe-3" style="height: auto; width: 97%; margin:auto">
                                <div class="col-lg-2 col-md-2" >
                                    <img class="img-fluid px-auto" src="{{ $details['food_image'] }}" alt="" style="height: 100px; padding-left: 40px;">
                                </div>
                                <div class="col-lg-10 col-md-10 ">
                                    <div class="row p-0 mr-0">
                                        <div class="col-lg-5">
                                            <div class="row p-3 ps-0">
                                                <div class="col-lg-12">
                                                    <h4 class="m-0">{{ $details['food_name'] }} </h4>
                                                </div>
                                                <div class="col-lg-12 mt-1">
                                                    <p>Size: Medium   ,   Crust Type: Thick</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-0" style="width: 100px">${{ $details['price'] }}</div>
                                        <div class="col-lg-3 d-flex ps-5">
                                            <p>{{ $details['quantity'] }}</p>
                                        </div>
                                        <div class="col-lg-1 px-4" style="">${{ $details['price'] * $details['quantity'] }}</div>
                                        <div class="col-lg-1 ps-5" style="width: ">
                                            <a class="action-icon d-block remove_product_via_cart" style="cursor: pointer;" data-product="34830" data-vendor_id="42">
                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- end for each food --}}

                        {{-- order total --}}

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end pe-5">
                                <p>Total : $ .......</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
                
    </div>
    
@endsection