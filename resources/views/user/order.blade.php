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

<div class="container-xl px-4 mt-4" style="height: auto; margin-bottom: 50px;">
    <div class="row">
        <div class="col-12 mb-2">
            <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
            <a href="" class="text-danger">CONTINUE SHOPPING</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 px-2">
            @foreach($orders as $order)
            <div class="cart-food box_shadow">
                <div class="row mx-2 mt-4 mb-2">
                    <div class="col-lg-6">
                        <h4 class="mb-4">Order #{{ $order->id }}</h4>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <h4 class="mb-4">Total: {{ $order->orderDetails->sum(function ($detail) { return $detail->quantity * $detail->food->price; }) }} USD</h4>
                    </div>
                </div>
                
                <div class="title-table mb-3">
                    <div class="row">
                        <div class="col-lg-5 text-center">
                            <span>PRODUCT DETAILS</span>
                        </div>
                        <div class="col-lg-2 text-center">
                            <span>PRICE</span>
                        </div>
                        <div class="col-lg-2 text-center">
                            <span>QUANTITY</span>
                        </div>
                        <div class="col-lg-3 text-center">
                            <span>TOTAL</span>
                        </div>
                    </div>
                </div>
                
                @foreach($order->orderDetails as $details)
                <div class="product-cart">
                    <div class="row mb-3 border-1 border-bottom pe-3" style="height: auto; width: 97%; margin:auto">
                        <div class="col-lg-2 col-md-2">
                            @if($details->food->image)
                                <img class="img-fluid px-auto" src="{{ asset($details->food->image) }}" alt="{{ $details->food->name }}" style="height: 100px; padding-left: 40px;">
                            @else
                                <img class="img-fluid px-auto" src="{{ asset($details->food->image) }}" alt="No image available" style="height: 100px; padding-left: 40px;">
                            @endif
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <div class="row p-0 mr-0">
                                <div class="col-lg-5">
                                    <div class="row p-3 ps-0">
                                        <div class="col-lg-12">
                                            <h4 class="m-0">{{ $details->food->name }}</h4>
                                        </div>
                                        @if($details->size && $details->crust)
                                        <div class="col-lg-12 mt-1">
                                            <p>Size: {{ $details->size->name }} , Crust Type: {{ $details->crust->name }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 p-0" style="width: 100px">${{ $details->food->price }}</div>
                                <div class="col-lg-3 d-flex ps-5">
                                    <p>{{ $details->quantity }}</p>
                                </div>
                                <div class="col-lg-2 ps-5">${{ $details->food->price * $details->quantity }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start ps-5 px-3 py-3">
                        Date: {{ $order->order_date }}
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end pe-5">
                        <p>Total: {{ $order->orderDetails->sum(function ($detail) { return $detail->quantity * $detail->food->price; }) }} USD</p>
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
