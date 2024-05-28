@extends('layouts.homeLayout')

@section('content')


<section>
    <div class="container " style="height: auto; margin-top: 150px; margin-bottom: 100px">
        <div class="row">
            <div class="col-12 mb-2">
                <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
                <a href="" class="text-danger"> CONTINUE SHOPPING</a>
            </div>
        </div>
        {{-- @foreach ($crust as $cr)
            
        <h1>{{$cr->name}}</h1>
        @endforeach

        @foreach ($size as $s)
            <h1> {{$s->name}} </h1>
        @endforeach --}}
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
                        
                    <div class="product-cart" 
                    data-id=" {{$id}} 
                    ">
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
                                            @if ($details['crust'] != 'N/A' && $details['size'] != 'N/A')
                                            <div class="col-lg-12 mt-3">
                                                <h6 class="d-flex">Size: 
                                                    <p>
                                                        {{$details['size']}}    
                                                    </p>
                                                </h6>
                                                <h6 class="d-flex">Crust Type: 
                                                    <p>
                                                        {{$details['crust']}}
                                                    </p>
                                                </h6>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 p-0 price" style="width: 100px">${{ $details['price'] }}</div>
                                    <div class="col-lg-3 d-flex p-0 " style="height: 29px; width: 150px; margin-right: 50px">
                                        {{-- <div class="ms-4 border border-1" style=" width: 80px; height: 40px; border-radius: 5px;">
                                            <input type="number" name="quantity" id="quantity" class="form-control product-qty" value="{{ $details['quantity'] }}" aria-valuemin="1">
                                        </div> --}}
                                        <td class="cart-product-quantity"  >
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                                    <span class="input-group-text">-</span>
                                                </div>
                                                <input type="text" class="qty-input form-control" maxlength="2" value=" {{ $details['quantity'] }} ">
                                                <div class="input-group-append increment-btn" style="cursor: pointer">
                                                    <span class="input-group-text">+</span>
                                                </div>
                                            </div>
                                        </td>
                                    </div>
                                    <div class="col-lg-2 px-4 item-total" style="">${{ $details['price'] * $details['quantity'] }}</div>

                                    <div class="col" style="width: 50px">
                                        <form action="{{ route('remove_from_cart') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="key" value="{{ $id }}">
                                            <a  class="action-icon d-block remove_product_via_cart" style="cursor: pointer;" data-product="34830" data-vendor_id="42">
                                            <button type="submit">
                                                <i class="fas fa-trash" aria-hidden="true" ></i>
                                            </button> 
                                            </a>    
                                        </form>
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
                                        <h5 id="subTotal">${{ $subTotal }}</h5>
                                    </div>
                                </div>
                                <div class="row  pt-3 border-top border-1" style="border-color: #e5e5e5">
                                    <div class="col-6">
                                        <p>
                                            Total
                                        </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <h5 id="total">${{ $total }}</h5>
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

<script>
// $(document).ready(function(){
    // $('.product-qty').on('change', function() {
    //     var key = $(this).closest('.product-cart').data('id').trim();
    //     var quantity = $(this).val();
    //     var data = {
    //         '_token': $('meta[name="csrf-token"]').attr('content'),
    //         'quantity': quantity,
    //         'key': key
    //     };

    //     $.ajax({
    //         url: `{{ route('update_cart') }}`,
    //         method: 'patch',
    //         data: data,
    //         success: function(response){
    //             if(response.status) {
    //                 alertify.set('notifier','position', 'top-right');
    //                 alertify.success('Product updated successfully');

    //                 // Update totals
    //                 $('#subTotal').text('$' + response.subTotal.toFixed(2));
    //                 $('#total').text('$' + response.total.toFixed(2));

    //                 // Update item total
    //                 var price = parseFloat($(`.product-cart[data-id="${key}"] .price`).text().replace('$', ''));
    //                 var newTotal = (price * quantity).toFixed(2);
    //                 $(`.product-cart[data-id="${key}"] .item-total`).text('$' + newTotal);
    //             }
    //         }
    //     });
    // });

    $(document).ready(function () {
    console.log("Document is ready");

    // Handle increment button click
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        console.log("Increment button clicked");
        
        var $qtyInput = $(this).parents('.quantity').find('.qty-input');
        console.log("Found input field:", $qtyInput);
        
        var value = parseInt($qtyInput.val(), 10);
        console.log("Current value:", value);
        
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $qtyInput.val(value);
            console.log("Updated value:", value);
        }
    });

    // Handle decrement button click
    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        console.log("Decrement button clicked");
        
        var $qtyInput = $(this).parents('.quantity').find('.qty-input');
        console.log("Found input field:", $qtyInput);
        
        var value = parseInt($qtyInput.val(), 10);
        console.log("Current value:", value);
        
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $qtyInput.val(value);
            console.log("Updated value:", value);
        }
    });
});


</script>