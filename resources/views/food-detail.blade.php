@extends('layouts.homeLayout')

@section('content')

<section>
    <div class="container border-top " style=" height: auto; margin-top: 150px; margin-bottom: 150px">
        <div class="row align-items-center">
            <div class="col-lg-5 justify-content-center mx-2">
                <ul class="img-sidebar ">
                    <img class="img-fluid" src="/img/pizzacom.jpg" alt="">
                </ul>
            </div>
            <div class="col mx-5" >
                <h2 class="mt-5 mb-4">
                    Pizza Name
                </h2>

                <h4 class="my-3">
                    Product Details:
                </h4>
                <h5 class="border-bottom pb-4 w-60">
                    Mozzarella Cheese, Pizza Sauce
                </h5>
                <h3 id="productPriceValue" class="my-md-5">
                    <b class="mr-1">$<span class="product_fixed_price">18.00</span></b>
                </h3>
                <div class="container pb-4">
                    <div class="row">
                        <div class="col-2">
                            <h5>
                                Size:
                            </h5>
                        </div>
                        <div class="col-3">
                            <label class="radio d-inline-block txt-14">
                                <input id="lineRadio-245" name="var_79" vid="79" optid="245" value="245" type="radio" class="changeVariant dataVar79" checked>
                                <span class="checkround m-1"></span>Medium
                                
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="radio d-inline-block txt-14 mr-2">
                                <input id="lineRadio-246" name="var_79" vid="79" optid="246" value="246" type="radio" class="changeVariant dataVar79">
                                <span class="checkround m-1"></span>Large
                            </label>
                        </div>
                    </div>
                </div>
                <div class="container border-bottom pb-4 mt-4">
                    <div class="row">
                        <div class="col-3">
                            <h5>Crust Type:</h5>
                        </div>
                        <div class="col-3">
                            <label class="radio d-inline-block txt-14">
                                <input id="thickCrust" name="crustType" type="radio" class="crustType" value="thick" checked>
                                <span class="checkround m-1"></span>Thick
                            </label>
                        </div>
                        <div class="col-3">
                            <label class="radio d-inline-block txt-14 mr-2">
                                <input id="thinCrust" name="crustType" type="radio" class="crustType" value="thin">
                                <span class="checkround m-1"></span>Thin
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" mt-5">
                    <div id="product_variant_quantity_wrapper" style="display: inline-block">
                        <div class=" pb-0">
                            <h5 class="product-title  my-2 mb-4" >Quantity:</h5>
                            <div class="qty-box mb-3 border border-1" style="border-radius: 5px">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="" data-batch_count=1 data-minimum_order_count=1><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    </span>
                                    <input type="text" name="quantity"  onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" id="quantity" class="form-control input-qty-number quantity_count"  value="1" data-minimum_order_count=1>
                                    <span class="input-group-prepend quant-plus">
                                        <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="" data-batch_count=1 data-minimum_order_count=1>
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-solid btn-primary px-5 addToCart" style="border-radius: 15px">
                            Add To Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
