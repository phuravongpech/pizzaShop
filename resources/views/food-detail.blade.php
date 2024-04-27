@extends('layouts.homeLayout')

@section('content')

<section>
    <div class="container border-top " style=" height: auto; margin-top: 150px; margin-bottom: 150px">
        <div class="row">
            <div class="col-12 my-3">
                <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
                <a href="/menu" class="text-danger"> CONTINUE SHOPPING</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 justify-content-center mx-2">
                <ul class="img-sidebar ">
                    <img class="img-fluid" src="{{ $foods->image }}" alt="">
                </ul>
            </div>
            <div class="col mx-5" >
                <h2 class="mt-5 mb-4">
                    {{$foods->name}}
                </h2>

                <h4 class="my-3">
                    Product Details:
                </h4>
                <h5 class="border-bottom pb-4 w-60">
                    {{$foods->desc}}
                </h5>
                <h3 id="productPriceValue" class="my-md-5">
                    <b class="mr-1">$<span class="product_fixed_price">{{$foods->price}}</span></b>
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
                                <span class="checkround m-1"></span>Size
                                
                            </label>
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
                                    <input type="text" name="quantity" id="quantity" class="form-control quantity"  value="1" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('add_to_cart', $foods->id) }}" method="POST">
                        @csrf
                        <div class="my-2">
                            <button type="submit" class="btn btn-solid btn-primary px-5 addToCart" style="border-radius: 15px">
                                Add To Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
