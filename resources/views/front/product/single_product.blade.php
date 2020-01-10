@extends('front.layouts.app')

@section('content')

    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <h1>DETAIL PRODUCT</h1>
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('/') }}">home</a></li>
                            <li><a href="#">product details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail pb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img id="big-img" src="{{ $product->images[0]->src }}" data-zoom-image="{{ $product->images[0]->src }}" alt="product-image" />

                    <div id="small-img" class="mt-20">

                        <div class="thumb-menu owl-carousel">
                            @foreach($product->images as $image)
                                <a href="#" data-image="{{ $image->src }}" data-zoom-image="{{ $image->src }}">
                                    <img src="{{ $image->src }}" alt="product-image" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description Start -->
                <div class="col-sm-7">
                    <div class="thubnail-desc fix">
                        <h2 class="product-header">{{ $product->title }}</h2>
                        <!-- Product Rating Start -->
                        <div class="rating-summary fix mtb-20">
                            <div class="rating f-left mr-10">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-feedback f-left">
                                <a href="#">0 reviews</a> /
                                <a href="#">Write a review</a>
                            </div>
                        </div>
                        <!-- Product Rating End -->
                        <!-- Product Price Start -->
                        <div class="pro-price mb-20">
                            <ul class="pro-price-list">
                                <li class="price">{{ number_format($product->price) }}</li>
                            </ul>
                        </div>
                        <!-- Product Price End -->
                        <!-- Product Price Description Start -->
                        <div class="product-price-desc">
                            <ul class="pro-desc-list">
                                @foreach($product->options as $option)
                                    <li>{{ $option->item_key }}: <span>{{ \App\OptionProduct::where('option_id',$option->id)->where('product_id',$product->id)->select('item_value')->first()->item_value }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Product Price Description End -->
                        <!-- Product Box Quantity Start -->
                        <div class="box-quantity mtb-20">
                            <div class="quantity-item">
                                <label>Qty: </label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                        </div>
                        <!-- Product Box Quantity End -->
                        <!-- Product Button Actions Start -->
                        <div class="product-button-actions">
                            <button class="add-to-cart">add to cart</button>
                            <a href="wish-list.html" data-toggle="tooltip" title="Add to Wishlist" class="same-btn mr-15"><i class="pe-7s-like"></i></a>
                            <button data-toggle="tooltip" title="Compare this Product" class="same-btn"><i class="pe-7s-repeat"></i></button>
                        </div>
                        <!-- Product Button Actions End -->
                        <!-- Product Social Link Share Start -->
                        <div class="social-shared">
                            <ul>
                                <li class="f-book">
                                    <a href="#">
                                        <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
                                        <span>like</span>
                                        <span>1</span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        <span>tweet</span>
                                    </a>
                                </li>
                                <li class="pinterest">
                                    <a href="#">
                                        <span><i class="fa fa-google" aria-hidden="true"></i></span>
                                        <span>plus</span>
                                    </a>
                                </li>
                                <!-- Product Social Link Share Dropdown Start -->
                                <li class="share-post">
                                    <a href="#">
                                        <span><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                                        <span>share</span>
                                    </a>
                                    <ul class="sharable-dropdown">
                                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>facebook</a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i>twitter</a></li>
                                        <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>print</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>email</a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i>pinterest</a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i>google+</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square" aria-hidden="true"></i>more(99)</a></li>
                                    </ul>
                                </li>
                                <!-- Product Social Link Share Dropdown End -->
                            </ul>
                        </div>
                        <!-- Product Social Link Share End -->
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc text-center list-inline">
                        <li class="active"><a data-toggle="tab" href="#detail">Details</a></li>
                        <li><a data-toggle="tab" href="#review">Reviews (0)</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content">
                        <div id="detail" class="tab-pane fade in active pb-40">
                            <p class="mb-10" style="direction: rtl;">
                                {{ strip_tags($product->details) }}
                            </p>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <div class="review">
                                <p class="mb-10">There are no reviews for this product.</p>
                                <h2>WRITE A REVIEW</h2>
                            </div>
                            <!-- Reviews End -->
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-30">
                                <form autocomplete="off" action="#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">name</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">your Review</label>
                                        <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                        <div class="help-block">
                                            <span class="text-danger">Note:</span> HTML is not translated!
                                        </div>
                                    </div>
                                    <div class="form-group required radio-label">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label req">Rating</label> &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                <input type="radio" name="rating" value="1"> &nbsp;
                                                <input type="radio" name="rating" value="2"> &nbsp;
                                                <input type="radio" name="rating" value="3"> &nbsp;
                                                <input type="radio" name="rating" value="4"> &nbsp;
                                                <input type="radio" name="rating" value="5"> &nbsp;Good
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" id="button-review">Continue</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
    <!-- Best Seller Products Start -->
    <div class="best-seller-products pb-100">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <h3 class="section-info">RELATED PRODUCTS</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Row End -->
            <div class="row">
                <!-- Best Seller Product Activation Start -->
                <div class="best-seller new-products owl-carousel">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/1_2.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/5_1.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/3_1.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/6_2.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/1_1.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/2_2.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/6_1.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/6_2.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/2_1.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/2_2.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="#">
                                <img class="primary-img" src="img/new-products/8_1.jpg" alt="single-product">
                                <img class="secondary-img" src="img/new-products/3_2.jpg" alt="single-product">
                            </a>
                            <div class="quick-view">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                            </div>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content text-center">
                            <h4><a href="product-page.html">Decorative Vase</a></h4>
                            <p class="price"><span>$241.99</span></p>
                            <div class="action-links2">
                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Best Seller Products End -->

@stop