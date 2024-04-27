@extends('layouts.homeLayout')

@section('content')

<style>
    .delivery_box {
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .box_shadow {
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        border: 1px solid #e5e5e5;
        border-radius: 20px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>

<section>
    <div class="container " style="height: auto; margin-top: 150px; margin-bottom: 100px">
        <div class="row">
            <div class="col-12 mb-2">
                <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
                <a href="" class="text-danger"> CONTINUE SHOPPING</a>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-9  px-2">
                {{-- cart food section --}}
                <div class="cart-food box_shadow">
                    <div class="row mx-2 mt-4 mb-2">
                        <div class="col-lg-6">
                            <h4 class="mb-4">
                                Your Cart
                            </h4>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <h4 class="mb-4 ">
                                @if (session()->has('cart'))
                                    {{ count(session('cart')) }} item{{ count(session('cart')) > 1 ? 's' : '' }}
                                @else
                                    @endif
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
                        <div class="row mb-3 border-1 border-bottom pe-3" style="height: auto">
                            <div class="col-lg-3 col-md-2">
                                <img class="img-fluid px-2" src="{{ $details['food_image'] }}" alt="">
                            </div>
                            <div class="col-lg-9 col-md-10 ">
                                <div class="row p-0 mr-0">
                                    <div class="col-lg-4">
                                        <div class="row p-3 ps-0">
                                            <div class="col-lg-12">
                                                <h4 class="m-0">{{ $details['food_name'] }} </h4>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <h6>Product Details:</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                {{-- <h6>{{ $details['food_desc'] }}</h6> --}}
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <h6 class="d-flex">Size: <p>Medium</p></h6>
                                                <h6 class="d-flex">Crust Type: <p>Thick</p></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 p-0" style="width: 100px">${{ $details['price'] }}</div>
                                    <div class="col-lg-3 d-flex p-0">
                                        <div class="ms-4 border border-1" style=" width: 80px; height: 40px; border-radius: 5px;">
                                            <input type="text" name="quantity" id="quantity" class="form-control quantity" value="{{ $details['quantity'] }}" min="1">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 px-4" style="">${{ $details['price'] * $details['quantity'] }}</div>
                                    <div class="col" style="width: 50px">
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
                </div>
                {{-- pick address --}}
                <div class="pick-add box_shadow mt-4">
                    <div class="row m-3">
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>
                                        Pick Address
                                    </h3>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <a class="add-address ml-auto" href="#add_new_address_form" data-toggle="modal" data-target="#add_new_address_form_modal">
                                        <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                                        <!-- Add New Address -->
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-sm-2 m-3 p-0">
                                {{-- put for each for address here --}}
                                @foreach ($addresses as $ad)
                                <div class="col-md-6  mb-2">
                                    <div class="  mb-sm-3  position-relative">
                                        <div class="delivery_box" style="border-radius: 10px">
                                            <label class="radio m-0 p-1">
                                                <span class="checkround"></span>
                                                <input type="radio" name="address_id" value="{{ $ad->id }}" {{ $loop->first ? 'checked' : '' }}>
                                                {{ $ad->address_detail }}, {{ $ad->address_no }}
                                                <br>
                                                {{ $ad->street }}, {{ $ad->city }} 
                                            </label>
                                        </div>
                                    </div>
                                </div>                                
                                @endforeach
                                {{-- end for each address --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- summary total order --}}
            <div class="col-lg-3 ">
                <div class="box_shadow pb-5 ps-2">
                    <div class="ms-3">
                        <h4 class="my-3 mt-5">
                            Order Summary
                        </h4>
                        <h5> Specific Instructions :</h5>
                        <input type="text" style="width: 100%; height: 50px;">
                        <div class="row mt-4  px-3" style="width: 90%;">
                            <div class="my-3">
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            Sub Total
                                        </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <h5>${{ $subTotal }}</h5>
                                    </div>
                                </div>
                                <div class="row  pt-3 border-top border-1" style="border-color: #e5e5e5">
                                    <div class="col-6">
                                        <p>
                                            Total
                                        </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <h5>${{ $total }}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-12 mt-2 text-sm-right cart-checkout_btn">
                                <form action="{{ route('session') }}" method="POST">
                                    @csrf
                                    <button id="checkout-live-button" class="btn btn-primary" type="submit" style="border-radius: 8px">
                                        Place Order/Checkout
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection
