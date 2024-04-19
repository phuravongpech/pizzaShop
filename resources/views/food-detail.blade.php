@extends('layouts.homeLayout')

@section('content')
<style>
    .product-right {
    text-align: right;
    margin-right: 10px;
}
.product-right .product-buttons {
    margin: 0 20px 20px 0;
}
.product-right .product-buttons {
        margin: 0;
    }

    .product-right .product-buttons .btn-outline,
    .product-right .product-buttons .btn-solid {
        margin: 0 0 10px !important;
    }
    .product-right.inner_spacing.pl-sm-3.p-0 {
    padding-left: 0px;
    padding-right: 1.5rem!important;
}
.description-text {
    margin-bottom: 20px
}

.product-right .size-box ul li {
    height: 35px;
    width: 35px;
    border-radius: 50%;
    margin-right: 10px;
    cursor: pointer;
    border: 1px solid #efefef;
    text-align: center;
}

.productVariants .firstChild {
    min-width: 150px;
    text-align: left !important;
    border-radius: 0 !important;
    margin-right: 10px;
    cursor: default;
    border: none !important;
}

.product-right p {
    margin-bottom: 0;
    line-height: 1.5em
}

.product-right .product-title {
    color: #222;
    text-transform: capitalize;
    font-weight: 700;
    margin-bottom: 0
}

.product-right .border-product {
    padding-top: 15px;
    padding-bottom: 20px;
    border-top: 1px dashed #ddd
}

.product-right h2 {
    text-transform: uppercase;
    margin-bottom: 15px;
    font-size: 25px;
    line-height: 1.2em
}

.product-right h3 {
    font-size: 26px;
    color: #222;
    margin-bottom: 15px
}

.product-right h4 {
    font-size: 16px;
    margin-bottom: 7px
}

.product-right h4 del {
    color: #777
}

.product-right h4 span {
    padding-left: 5px;
    color: var(--theme-deafult)
}

.product-right .color-variant {
    margin-bottom: 10px
}

.product-right .color-variant li {
    height: 30px;
    width: 30px;
    cursor: pointer
}

.product-right .product-buttons {
    margin-bottom: 20px
}

.product-right .product-buttons .btn-outline,.product-right .product-buttons .btn-solid {
    padding: 7px 25px
}

.product-right .product-buttons a:last-child {
    margin-left: 10px
}

.product-right .product-description h6 span {
    float: right
}

.product-right .product-description .qty-box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-top: 10px
}

.product-right .product-description .qty-box .input-group {
    -webkit-box-pack: unset;
    -ms-flex-pack: unset;
    justify-content: unset;
    width: unset
}

.product-right .product-description .qty-box .input-group .form-control {
    border-right: none
}

.product-right .size-box {
    margin-top: 10px;
    margin-bottom: 10px
}

.product-right .size-box ul li {
    height: 35px;
    width: 35px;
    border-radius: 50%;
    margin-right: 10px;
    cursor: pointer;
    border: 1px solid #f7f7f7;
    text-align: center
}

.product-right .size-box ul li a {
    color: #222;
    font-size: 18px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    height: 100%
}

.product-right .size-box ul li.active {
    background-color: #f7f7f7
}

.product-right .product-icon {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex
}

.product-right .product-icon .product-social {
    margin-top: 5px
}

.product-right .product-icon .product-social li {
    padding-right: 30px
}

.product-right .product-icon .product-social li a {
    color: #333;
    -webkit-transition: all .3s ease;
    transition: all .3s ease
}

.product-right .product-icon .product-social li a i {
    font-size: 18px
}

.product-right .product-icon .product-social li a:hover {
    color: var(--theme-deafult)
}

.product-right .product-icon .product-social li:last-child {
    padding-right: 0
}

.product-right .product-icon .wishlist-btn {
    background-color: transparent;
    border: none
}

.product-right .product-icon .wishlist-btn i {
    border-left: 1px solid #ddd;
    font-size: 18px;
    padding-left: 10px;
    margin-left: 5px;
    -webkit-transition: all .5s ease;
    transition: all .5s ease
}

.product-right .product-icon .wishlist-btn span {
    padding-left: 10px;
    font-size: 18px
}

.product-right .product-icon .wishlist-btn:hover i {
    color: var(--theme-deafult);
    -webkit-transition: all .5s ease;
    transition: all .5s ease
}

.product-right .payment-card-bottom {
    margin-top: 10px
}

.product-right .payment-card-bottom ul li {
    padding-right: 10px
}

.product-right .timer {
    margin-top: 10px;
    background-color: #f7f7f7
}

.product-right .timer p {
    color: #222
}

.product-right.product-form-box {
    text-align: center;
    border: 1px solid #ddd;
    padding: 20px
}

.product-right.product-form-box .product-description .qty-box {
    margin-bottom: 5px
}

.product-right.product-form-box .product-description .qty-box .input-group {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 100%
}

.product-right.product-form-box .product-buttons {
    margin-bottom: 0
}

.product-right.product-form-box .timer {
    margin-bottom: 10px;
    text-align: left
}

</style>
    
<section class="section-b-space alSingleProducts product_ddetails_page">
    <div class="collection-wrapper al">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-sm-left">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="container-fluid">
                        <section class="buy_details">
                            <div class="row">
                                <div class="col-lg-5 p-0">
                                    <div class="exzoom hidden w-100">
                                        <div class="exzoom_img_box mb-2">
                                            <ul class='exzoom_img_ul img-sidebar'>
                                                <img id="main_image" src="https://images.hungryapp.asia/insecure/fit/1000/1000/ce/0/plain/https://hungryapp-assests.s3.ap-southeast-1.amazonaws.com/48b467/prods/f1IEhBVGwE1iRO2oXNPjvg6YQ2ZPJqVxwrBeXuGA.jpg@webp" />
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 rtl-text p-0">
                                    <div class="product-right inner_spacing pl-sm-3 p-0">
                                        <h2 class="mb-0">Extra Cheesy Sausage Double Cheese Pizza</h2>
                                        <span class="rating main-rating">4.1<i class="fa fa-star" aria-hidden="true"></i></span>
                                        <h6 class="sold-by">
                                            <b><img class="blur-up lazyload" data-src="https://images.hungryapp.asia/insecure/fit/200/200/ce/0/plain/https://hungryapp-assests.s3.ap-southeast-1.amazonaws.com/vendor/Jjo0YSyk0z4Mw1SbvnB9PAYnMIIJLsHpRJpoGkdB.png@webp" alt=""></b> 
                                            <a href="https://order.hungryapp.asia/vendor/the-pizza-company-riverside-31345">
                                                <b>The Pizza Company - Riverside 313</b>
                                            </a>
                                        </h6>
                                        <div class="description_txt mt-3">
                                            <p></p>
                                        </div>
                                        <input type="hidden" name="available_product_variant" id="available_product_variant" value="100028">
                                        <input type="hidden" name="start_time" id="start_time" value="">
                                        <input type="hidden" name="end_time" id="end_time" value="">
                                        <div id="product_variant_wrapper">
                                            <input type="hidden" name="variant_id" id="prod_variant_id" value="100028">
                                            <h3 id="productPriceValue" class="mb-md-3">
                                                <b class="mr-1">$<span class="product_fixed_price">18.00</span></b>
                                            </h3>
                                        </div>
                                        <div class="border-product al_disc">
                                            <h6 class="product-title">Product Details</h6>
                                            <p>Mozzarella Cheese, Pizza Sauce</p>
                                        </div>
                                        <div id="product_variant_options_wrapper">
                                            <div class="size-box">
                                                <ul class="productVariants">
                                                    <li class="firstChild">Size</li>
                                                    <li class="otherSize">
                                                        <label class="radio d-inline-block txt-14 mr-2">Medium
                                                            <input id="lineRadio-245" name="var_79" vid="79" optid="245" value="245" type="radio" class="changeVariant dataVar79" checked>
                                                            <span class="checkround"></span>
                                                        </label>
                                                        <label class="radio d-inline-block txt-14 mr-2">Large
                                                            <input id="lineRadio-246" name="var_79" vid="79" optid="246" value="246" type="radio" class="changeVariant dataVar79">
                                                            <span class="checkround"></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="variant_response">
                                            <span class="text-danger mb-2 mt-2"></span>
                                        </div>
                                        <div class="btn-wrapper">
                                            <div id="product_variant_quantity_wrapper" style="display: inline-block">
                                                <div class="product-description border-product pb-0">
                                                    <h6 class="product-title mt-0">Quantity:</h6>
                                                    <div class="qty-box mb-3">
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
                                            <div class="product-buttons">
                                                <button type="button" class="btn btn-solid addWishList mr-2" proSku="asia.hungryapp.order.ThePizzaCompany-Riverside313.extra cheesy sausage double cheese pizza" remWishlist="Remove From Wishlist" addWishlist="Add To Wishlist">Add To Wishlist</button>
                                                <a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-solid addToCart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="border-product">
                                            <h6 class="product-title">Share It</h6>
                                            <div class="product-icon w-100">
                                                <div id="social-links">
                                                    <ul>
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://order.hungryapp.asia/the-pizza-company-riverside-31345/product/Extra%20Cheesy%20Sausage%20Double%20Cheese%20Pizza" class="social-button" id="" title="" rel=""><span class="fab fa-facebook-square"></span></a></li>
                                                        <li><a href="https://twitter.com/intent/tweet?text=Your+share+text+comes+here&url=https://order.hungryapp.asia/the-pizza-company-riverside-31345/product/Extra%20Cheesy%20Sausage%20Double%20Cheese%20Pizza" class="social-button" id="" title="" rel=""><span class="fab fa-twitter"></span></a></li>
                                                        <li><a target="_blank" href="https://wa.me/?text=https://order.hungryapp.asia/the-pizza-company-riverside-31345/product/Extra%20Cheesy%20Sausage%20Double%20Cheese%20Pizza" class="social-button" id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 border">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 p-0">
                            <ul class="img-sidebar">
                                <img src="/img/pizzacom.jpg" alt="">
                            </ul>
                        </div>
                        <div class="col-lg-4 rtl-text p-0 ">
                            <div class="product-right pl-sm-3 p-0">
                                <h2 class="mb-0">
                                    Pizza Name
                                </h2>

                                <div class="description-text mt-3">
                                    <p>
                                        Description
                                    </p>
                                </div>
                                <h3 class="mb-md-3">
                                    <b class="mr-1">$<span>Price</span></b>
                                </h3>
                                <div class="mb-md-3">
                                    <h6>Product Details</h6>
                                    <p>Mozzarella Cheese, Pizza Sauce</p>
                                </div>
                                <div class="size-box">
                                    <ul class="productVariants">
                                        <li class="firstChild">Size</li>
                                        <li class="otherSize">
                                            <label class="radio d-inline-block txt-14 mr-2">Medium
                                                <input id="lineRadio-245" name="var_79" vid="79" optid="245" value="245" type="radio" class="changeVariant dataVar79" checked>
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio d-inline-block txt-14 mr-2">Large
                                                <input id="lineRadio-246" name="var_79" vid="79" optid="246" value="246" type="radio" class="changeVariant dataVar79">
                                                <span class="checkround"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
