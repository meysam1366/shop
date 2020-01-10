@extends('front.layouts.app')

@section('content')
    <!-- Slider Area Start -->
    <div class="slider-area pb-100 home-2-slider">
        <!-- Main Slider Area Start -->
        <div class="slider-wrapper theme-default">
            <!-- Slider Background  Image Start-->
            <div id="slider" class="nivoSlider">
                @foreach($sliders as $key => $slider)
                    <img src="{{ url('/').$slider->image }}" data-thumb="{{ url('/').$slider->image }}" alt="{{ $slider->title }}" title="#htmlcaption{{ $key }}" />
                @endforeach
            </div>
            <!-- Slider Background  Image Start-->
            @foreach($sliders as $key => $slider)
                <!-- Slider htmlcaption Start-->
                <div id="htmlcaption{{ $key }}" class="nivo-html-caption slider-caption">
                    <!-- Slider Text Start -->
                    <div class="slider-text">
                        <h2 class="wow fadeInLeft" data-wow-delay="1s">{{ $slider->title }}</h2>
                        <p class="wow fadeInRight" data-wow-delay="1s">{{ $slider->subtitle }}</p>
                        <a class="wow bounceInDown" data-wow-delay="0.8s" href="{{ $slider->link }}">shop now</a>
                    </div>
                    <!-- Slider Text End -->
                </div>
                <!-- Slider htmlcaption End -->
            @endforeach
        </div>
        <!-- Main Slider Area End -->
    </div>
    <!-- Slider Area End -->
    <!-- home-2 Banner Start -->
    <div class="home-home-2-banner pb-100">
        <div class="container-fluid plr-0">
            <div class="row">
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <img src="/front/img/products-banner/6.jpg" alt="single-banner">
                        <div class="banner-content">
                            <h5>Garden Lanterns</h5>
                            <h3>Flash Sale</h3>
                            <a href="categorie-page.html">shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <img src="/front/img/products-banner/7.jpg" alt="single-banner">
                        <div class="banner-content">
                            <h5>Home Decor</h5>
                            <h3>Sale 30% Off</h3>
                            <a href="categorie-page.html">shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <img src="/front/img/products-banner/8.jpg" alt="single-banner">
                        <div class="banner-content">
                            <h5>New Collection</h5>
                            <h3>Chain Lamp</h3>
                            <a href="categorie-page.html">shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- home-2 Banner End -->
    <!-- home-2 New Products Start -->
    <div class="h2-new-products pb-80">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <span class="section-desc mb-15">Top new in this week</span>
                        <h3 class="section-info">new products</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <ul class="text-center list-inline new-products-list mb-30">
                        <li class="active"><a data-toggle="tab" href="#all">All</a></li>
                        <li><a data-toggle="tab" href="#furniture">Furnitures</a></li>
                        <li><a data-toggle="tab" href="#decoration">Decoration</a></li>
                        <li><a data-toggle="tab" href="#accessories">Accessories</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="all" class="tab-pane fade in active">
                            <!-- Best Seller Product Activation Start -->
                            <div class="best-seller new-products owl-carousel">
                                @foreach($products as $product)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ route('single_product',['slug'=>$product->slug]) }}">
                                            <img class="primary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                            <img class="secondary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                        </a>
                                        <div class="quick-view">
                                            <a href="{{ route('single_product',['slug'=>$product->slug]) }}" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                        </div>
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content text-center">
                                        <h4><a href="{{ route('single_product',['slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                        <p class="price"><span>{{ number_format($product->price) }}</span></p>
                                        <div class="action-links2">
                                            <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Best Seller Product Activation Start -->
                        </div>
                        <!-- All Products List End -->
                        <div id="furniture" class="tab-pane fade">
                            <!-- Best Seller Product Activation Start -->
                            <div class="best-seller new-products owl-carousel">
                            @foreach($products as $product)
                                <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{ route('single_product',['slug'=>$product->slug]) }}">
                                                <img class="primary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                                <img class="secondary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                            </a>
                                            <div class="quick-view">
                                                <a href="{{ route('single_product',['slug'=>$product->slug]) }}" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                            </div>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content text-center">
                                            <h4><a href="{{ route('single_product',['slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                            <p class="price"><span>{{ number_format($product->price) }}</span></p>
                                            <div class="action-links2">
                                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Best Seller Product Activation Start -->
                        </div>
                        <!-- Furnitures Products End -->
                        <div id="decoration" class="tab-pane fade">
                            <!-- Best Seller Product Activation Start -->
                            <div class="best-seller new-products owl-carousel">
                            @foreach($products as $product)
                                <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{ route('single_product',['slug'=>$product->slug]) }}">
                                                <img class="primary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                                <img class="secondary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                            </a>
                                            <div class="quick-view">
                                                <a href="{{ route('single_product',['slug'=>$product->slug]) }}" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                            </div>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content text-center">
                                            <h4><a href="{{ route('single_product',['slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                            <p class="price"><span>{{ number_format($product->price) }}</span></p>
                                            <div class="action-links2">
                                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Best Seller Product Activation Start -->
                        </div>
                        <!-- Decoration Products End -->
                        <div id="accessories" class="tab-pane fade">
                            <!-- Best Seller Product Activation Start -->
                            <div class="best-seller new-products owl-carousel">
                            @foreach($products as $product)
                                <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{ route('single_product',['slug'=>$product->slug]) }}">
                                                <img class="primary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                                <img class="secondary-img" src="{{ url('/').$product->img_thumbnail }}" alt="single-product">
                                            </a>
                                            <div class="quick-view">
                                                <a href="{{ route('single_product',['slug'=>$product->slug]) }}" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                            </div>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content text-center">
                                            <h4><a href="{{ route('single_product',['slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                            <p class="price"><span>{{ number_format($product->price) }}</span></p>
                                            <div class="action-links2">
                                                <a data-toggle="tooltip" title="Add to Cart" href="cart.html">add to cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Best Seller Product Activation Start -->
                        </div>
                        <!-- Accessories Products End -->
                    </div>
                    <!-- Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- home-2 New Products End -->
    <!-- home-2 Big Banner Start -->
    <div class="h2-big-banner pb-100">
        <div class="container">
            <div class="row">
                <!-- Big Banner Start -->
                <div class="col-sm-12">
                    <div class="big-banner text-center">
                        <div class="big-banner-desc">
                            <h2>Interior Creativity with Nevara</h2>
                            <a href="categorie-page.html">view more</a>
                        </div>
                    </div>
                </div>
                <!-- Big Banner End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- home-2 Big Banner End -->
    <!-- home-2 Featured Products Start -->
    <div class="h2-featured-products pb-80">
        <div class="container-fluid plr-0">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <span class="section-desc mb-20">We offer the best selection decor</span>
                        <h3 class="section-info">featured products</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="featured-pro owl-carousel">
                        <!-- Single Product Start -->
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/1_2.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/5_1.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                                <span class="sticker-sale">sale</span>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content text-center">
                                <h4><a href="product-page.html">Sheepskin Pillow2</a></h4>
                                <p class="price"><span>$145.99</span></p>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/3_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/6_2.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                                <span class="sticker-sale">sale</span>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/2_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/2_2.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content text-center">
                                <h4><a href="product-page.html">congue sitamet</a></h4>
                                <p class="price"><span>$175.49</span></p>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/6_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/6_2.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content text-center">
                                <h4><a href="product-page.html">dictum idrisus</a></h4>
                                <p class="price"><span>$171.29</span></p>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/2_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/2_2.jpg" alt="single-product">
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/8_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/3_2.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content text-center">
                                <h4><a href="product-page.html">Carte Postal Clock</a></h4>
                                <p class="price"><span>$170.00</span></p>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/6_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/6_2.jpg" alt="single-product">
                                </a>
                                <div class="quick-view">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                </div>
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content text-center">
                                <h4><a href="product-page.html">dictum idrisus</a></h4>
                                <p class="price"><span>$350.29</span></p>
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
                                <a href="product-page.html">
                                    <img class="primary-img" src="/front/img/new-products/6_1.jpg" alt="single-product">
                                    <img class="secondary-img" src="/front/img/new-products/6_2.jpg" alt="single-product">
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
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- home-2 Featured Products End -->
    <!-- Footer Start -->
    <footer>
        <!-- Footer Top Start -->
        <div class="footer-top ptb-50">
            <div class="container">
                <div class="row">
                    <div class="banner-slider owl-carousel">
                        @foreach($brands as $brand)
                            <!-- Single Banner Start -->
                            <div class="single-banner">
                                <a href="{{ $brand->website }}"><img src="{{ url('/').$brand->img_thumbnail }}" alt="banner-image"></a>
                            </div>
                            <!-- Single Banner End -->
                        @endforeach
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Footer Top End -->
@endsection