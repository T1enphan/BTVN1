<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('client.shares.css')
    </head>
    <body>
        <header>
            <div id="header-sticky" class="header-area box-90">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-5 d-flex align-items-center pos-relative">
                            <div class="basic-bar cat-toggle">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                            <div class="logo">
                                <a href="index.html"><img src="/assets_client/img/logo/logo.png" alt=""></a>
                            </div>

                            <div class="category-menu">
                                <h4>Category</h4>
                                <ul>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Table lamp</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Furniture</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Chair</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Men</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Women</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Cloth</a></li>
                                    <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Trend</a></li>
                                </ul>
                            </div>
                        </div>
                        @include("client.shares.menu")
                        <div class="col-xl-2 col-lg-6 col-md-6 col-5 col-sm-7 pl-0">
                            <div class="header-right f-right">
                                <ul>
                                    <li class="search-btn">
                                        <a class="search-btn nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                    <li class="login-btn"><a href="/login"><i class="far fa-user"></i></a></li>
                                    <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart"></i> <span class="cart-count">3</span></a>
                                        <ul class="minicart">
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="/assets_client/img/product/pro1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="/assets_client/img/product/pro2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="/assets_client/img/product/pro3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">Total:</span>
                                                    <span class="f-right">$300.0</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkout-link">
                                                    <a href="cart.html">Shopping Cart</a>
                                                    <a class="red-color" href="/checkout    ">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 d-xl-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <main>
            <!-- slider-area start -->
                @include('client.shares.slider_area')
            <!-- slider-area end -->

            <!-- banner area start -->
            @include('client.shares.banner_area')
            <!-- banner area end -->

            <!-- product-area start -->
            @include('client.shares.product_area')
            <!-- product-area end -->

            <!-- top-seller-area start -->
            @include('client.shares.top_seller_area')
            <!-- top-seller-area end -->

            <!-- product-area start -->
            <!-- product-area end -->

            <!-- upcoming-product-area start -->
            @include('client.shares.upcoming_product_area')
            <!-- upcoming-product-area end -->

            <!-- latest-blog-area start -->
            @include('client.shares.latest_blog_area')
            <!-- latest-blog-area end -->

            <!-- subscribe-area start -->
            @include('client.shares.subscribe_area')
            <!-- subscribe-area end -->
        </main>

        <!-- footer start -->
        @include("client.shares.footer")
        <!-- footer end -->

    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search Entire Store...">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end fullscreen search -->





		<!-- JS here -->
       @include('client.shares.js')
    </body>
</html>
