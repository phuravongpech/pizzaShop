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
                <form action="{{ route('add_to_cart', $foods->id) }}" method="POST">
                    @csrf
                    <div class="container pb-4">
                        @if ($foods->category_id == 1)
                        <div class="row">
                            <div class="col-2">
                                <h5>
                                    Size:
                                </h5>
                            </div>
                            <div class="col-3">
                                <label class="radio d-inline-block txt-14">
                                    <input type="radio" name="size" value="1" checked>
                                    <span class="checkround m-1"></span>Small
                                </label>
                            </div>
                            <div class="col-3">
                                <label class="radio d-inline-block txt-14">
                                    <input type="radio" name="size" value="2">
                                    <span class="checkround m-1"></span>Medium
                                </label>
                            </div>
                            <div class="col-2">
                                <label class="radio d-inline-block txt-14 mr-2">
                                    <input type="radio" name="size" value="3">
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
                                    <input type="radio" name="crust" value="1" checked>
                                    <span class="checkround m-1"></span>Thick
                                </label>
                            </div>
                            <div class="col-3">
                                <label class="radio d-inline-block txt-14 mr-2">
                                    <input type="radio" name="crust" value="2">
                                    <span class="checkround m-1"></span>Thin
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class=" mt-5">
                        <div id="product_variant_quantity_wrapper" style="display: inline-block">
                            <div class=" pb-0">
                                <h5 class="product-title  my-2 mb-4" >Quantity:</h5>
                                <div class="qty-box mb-3 border border-1" style="border-radius: 5px">
                                    <div class="input-group">
                                        <input type="number" name="quantity" id="quantity" class="form-control quantity" value="1" aria-valuemin="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <button type="submit" class="btn btn-solid btn-primary px-5 addToCart" style="border-radius: 15px">
                                Add To Cart
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
