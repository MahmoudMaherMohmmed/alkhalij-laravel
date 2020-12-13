<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Al5lyg || @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/chosen.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/easyzoom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/jquery.auto-complete.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,300italic,300,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/css/cc3333.css">
    <style>
        .header.style6 .main-header-menu-wapper {
            box-shadow: 1px 5px 5px 0px rgba(0, 0, 0, 0.09);
            border-top: 1px solid #eee;
        }

        @media (max-width: 767px) {
            .header .top-bar-menu {
                text-align: center !important;
            }
        }
    </style>

    @yield('style')
</head>
<body class="">
<div id="box-mobile-menu" class="full-height full-width box-mobile-menu">
    <div class="box-inner">
        <a href="#" class="close-menu"><span class="icon fa fa-times"></span></a>
    </div>
</div>
<div id="header-ontop" class="is-sticky"></div>

<!-- Header -->
<div id="header" class="header style2 style6">
    <div class="top-bar">
        <div class="container">
            @if(isset($website_setting) && $website_setting!=null)
                <ul class="kt-nav top-bar-menu">
                    <li>
                        <a href="javascript:void(0);">HOTLINE: {{isset($website_setting->phone_1)&&$website_setting->phone_1!=null ? $website_setting->phone_1.' - ' : ''}}{{isset($website_setting->phone_2)&&$website_setting->phone_2!=null ? $website_setting->phone_2 : ''}}</a>
                    </li>

                    <li>
                        <a href="javascript:void(0);">EMAIL: {{isset($website_setting->email_1)&&$website_setting->email_1!=null ? $website_setting->email_1.' - ' : ''}}{{isset($website_setting->email_2)&&$website_setting->email_2!=null ? $website_setting->email_2 : ''}}</a>
                    </li>
                </ul>
            @endif
            <ul class="kt-nav top-bar-menu right">
                <li class="menu-item-has-children">
                    <a href="#">Curency</a>
                    <ul class="sub-menu">
                        <li><a href="#">USD</a></li>
                        <li><a href="#">FR</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Language</a>
                    <ul class="sub-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row main-header-wapper">
                <div class="col-sm-12 col-md-3">
                    @if(isset($website_setting) && $website_setting!=null)
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('files/'.$website_setting->image)}}"
                                                        alt="{{getDefaultValueKey($website_setting->title)}}"></a>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-9">
                    <form class="advanced-search">
                        <div class="search-text-box">
                            <input class="input" name="search_key" type="text"
                                   placeholder="Search entire store here...">
                        </div>
                        <button class="btn-search"><span class="flaticon-magnifying-glass34"></span></button>
                    </form>

                    <div class="header-right">
                        <div class="header-account">
                            @if(!Auth::guard('web')->check() && !Auth::guard('customer')->check())
                                <span class="title">Welcome, Sign in!</span>
                                <ul class="kt-nav menu-account">
                                    <li class="menu-item-has-children">
                                        <a href="#">Your Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('customer.login')}}">Sign in</a></li>
                                            <li><a href="{{route('customer.login')}}">Sign up</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @elseif(Auth::guard('web')->check())
                                <span class="title">Welcome, {{Auth::guard('web')->user()->name}}</span>
                                <ul class="kt-nav menu-account">
                                    <li class="menu-item-has-children">
                                        <a href="#">Your Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('admin/home')}}">Dashboard</a></li>
                                            <li><a href="javascript:void(0);"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @elseif(Auth::guard('customer')->check())
                                <span class="title">Welcome, {{Auth::guard('customer')->user()->name}}</span>
                                <ul class="kt-nav menu-account">
                                    <li class="menu-item-has-children">
                                        <a href="#">Your Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="javascript:void(0);">Wishlist</a></li>
                                            <li><a href="javascript:void(0);"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <div class="mini-cart">
                            <a class="cart-link" href="#">
                                <span class="menu-icon  icon pe-7s-shopbag"></span>
                                <span class="count">0</span>
                                <span class="text">CART</span>
                                <span class="kak">:</span>
                                <span class="subtotal">$0.00</span>
                            </a>
                            <div class="sub-menu mini-cart-content">
                                <div class="content-inner">
                                    <h3 class="box-title">You have <span class="count">1 item(s)</span> in your cart.
                                    </h3>
                                    <ul class="list-item-cart">
                                        <li class="item-cart">
                                            <div class="thumb">
                                                <a href="#"><img src="{{asset('front')}}/images/products/1.png" alt=""></a>
                                            </div>
                                            <div class="product-info">
                                                <h4 class="product-name"><a href="#">Stockholm Chair high Mosta
                                                        gruancy</a></h4>
                                                <span class="price">1 x $75.00</span>
                                                <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                            </div>
                                        </li>
                                        <li class="item-cart">
                                            <div class="thumb">
                                                <a href="#"><img src="{{asset('front')}}/images/products/1.png" alt=""></a>
                                            </div>
                                            <div class="product-info">
                                                <h4 class="product-name"><a href="#">Stockholm Chair high Mosta
                                                        gruancy</a></h4>
                                                <span class="price">1 x $75.00</span>
                                                <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="subtotal">
                                        Subtotal: <span class="amout">$75.00</span>
                                    </div>
                                    <a href="{{url('/cart')}}" class="button">SHOPPING CART</a>
                                    <a href="{{url('/checkout')}}" class="button primary">CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header-menu-wapper">
        <div class="container">
            <div class="header-control">
                @if(isset($categories) && count($categories)>0)
                    <div class="vertical-menu-wapper">
                        <div class="box-vertical-megamenus" data-items="10">
                            <h4 class="title"><span class="bar"><i class="fa fa-bars"></i></span><span class="text">Categories</span>
                            </h4>
                            <div class="verticalmenu-content">
                                <ul class="kt-nav verticalmenu-list">
                                    @foreach($categories as $category)
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                @if(isset($category->image) && $category->image)
                                                    <span class="menu-icon">
                                                    <img src="{{asset('files/'.$category->image)}}"
                                                         alt="{{getDefaultValueKey($category->title)}}">
                                                </span>
                                                @endif
                                                {{getDefaultValueKey($category->title)}}
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach($popular_manufactures as $manufacture)
                                                    <li><a href="#">{{getDefaultValueKey($manufacture->title)}}</a></li>
                                                @endforeach
                                            </ul>
                                            <a data-closetext="Close" data-opentext="View All" class="viewall closed"
                                               href="#"><span class="text">View All</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a data-closetext="Close" data-opentext="View All" class="viewall closed" href="#"><span
                                        class="text">View All</span></a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="box-serach-wapper main-menu-wapper">
                    <a class="mobile-navigation" href="#">
							<span class="icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        Main Menu
                    </a>
                    <ul class="kt-nav main-menu clone-main-menu">
                        <li class="active">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{url('/products')}}">Shop</a>
                        </li>
                        <li>
                            <a href="{{url('/about')}}">About</a>
                        </li>
                        <li>
                            <a href="{{url('/contact')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./Header -->

<!-- Content -->
@yield('content')
<!-- ./Content -->

<!-- Footer -->
<footer class="footer style2 style6">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="widget widget_store_info">
                    <div class="content">
                        @if(isset($website_setting) && $website_setting!=null)
                            <div class="text-center logo"><img src="{{asset('files/'.$website_setting->image)}}"
                                                               alt="{{getDefaultValueKey($website_setting->title)}}">
                            </div>
                        @endif
                        @if(isset($website_setting->description) && $website_setting->description!=null)
                            <p class="item" style="color: #666;">
                                <span class="text">{{getDefaultValueKey($website_setting->description)}}</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="widget widget-nav">
                    <h3 class="widget-title">products</h3>
                    <ul>
                        <li><a href="#">My Order</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">My Credit Slip</a></li>
                        <li><a href="#">My Addresses</a></li>
                        <li><a href="#">My Personal</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="widget widget-nav">
                    <h3 class="widget-title">Support</h3>
                    <ul>
                        <li><a href="#">My Order</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">My Credit Slip</a></li>
                        <li><a href="#">My Addresses</a></li>
                        <li><a href="#">My Personal</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                @if(isset($sociallinks) && count($sociallinks)>0)
                    <div class="widget kt_widget_social">
                        <h3 class="widget-title">follow us on</h3>
                        <div class="social">
                            @foreach($sociallinks as $sociallink)
                                <a class="{{$sociallink->class}}" href="{{$sociallink->link}}"><i
                                        class="{{$sociallink->icon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="widget kt_widget_newsletter">
                    <h3 class="widget-title">SIGN UP FOR NEWSLETTER</h3>
                    <form>
                        <input type="text" placeholder="Enter your email here" class="text-input">
                        <button class="button">OK</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="payment">
                        <div class="coppyright">Copyright © Kutethemes. All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./Footer -->

<a href="#" class="scroll_top" title="Scroll to Top"><i class="fa fa-arrow-up"></i></a>
<script type="text/javascript" src="{{asset('front')}}/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/Modernizr.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.plugin.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.countdown.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/wow.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/easyzoom.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/jquery.hoverdir.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/masonry.js"></script>
<script type="text/javascript" src="{{asset('front')}}/js/functions.js"></script>

<script type="text/javascript" src="{{asset('front')}}/js/jquery.auto-complete.js"></script>
<script>
    $('input[name="search_key"]').autoComplete({
        minChars: 1,
        source: function (term, response) {
            $.getJSON('{{url('search/')}}', {search_key: term}, function (data) {
                response(data);
            });
        }
    });
</script>
@yield('script')
</body>

</html>
