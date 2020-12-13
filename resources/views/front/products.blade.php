@extends('front.layouts.app')

@section('title') Shop @endsection

@section('style')
    <style>
        .verticalmenu-content {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page-banner bg-parallax"></div>
    <div class="main-container left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9 main-content">
                    <div class="shop-page-bar">
                        <nav class="woocommerce-breadcrumb breadcrumbs">
                            <a href="#">Home</a>
                            <a href="#">Clothing</a>
                            Hoodies
                        </nav>
                        <div class="page-bar-right">
                            <form class="woocommerce-ordering">
                                <select name="orderby" class="orderby" style="display: none;">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    @if(isset($cartridges) && $cartridges!=null && count($cartridges)>0)
                        <ul class="products product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1">
                            @foreach($cartridges as $cartridge)
                                <li class="product-item col-md-4 col-sm-6 col-xs-12">
                                    <div class="product-inner">
                                        <div class="thumb has-second-image">
                                            <a href="{{route('product_details',[$cartridge->slug])}}">
                                                <img src="{{asset('files/'.$cartridge->image)}}"
                                                     alt="{{getDefaultValueKey($cartridge->title)}}"
                                                     style="height: 325px;">
                                                <img class="second-image"
                                                     src="{{asset('files/'.$cartridge->image)}}"
                                                     alt="{{getDefaultValueKey($cartridge->title)}}"
                                                     style="height: 325px;">
                                            </a>
                                            <div class="group-button">
                                                <a class="wishlist" href="#">Wishlist</a>
                                                <a class="button add_to_cart_button" href="#">Add to cart</a>
                                                <a class="compare button" href="#">Compare</a>
                                            </div>
                                            <a href="{{route('product_details',[$cartridge->slug])}}"
                                               title="Quick View"
                                               class="button quick-view yith-wcqv-button">
                                                Quick View
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h3 class="product-name short">
                                                <a href="{{route('product_details',[$cartridge->slug])}}">
                                                    {{getDefaultValueKey($cartridge->title)}}
                                                </a>
                                            </h3>
                                            <span class="price">{{getPrice($cartridge->customer_price)}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{ $cartridges->links() }}

                        <nav class="woocommerce-pagination navigation">
                            <ul class="page-numbers">
                                <li><span class="page-numbers current">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
                <div class="col-sm-4 col-md-3 sidebar">
                    @if(isset($categories) && $categories!=null&&count($categories)>0)
                        <div class="widget widget_product_categories">
                            <h2 class="widget-title">PRODUCT CATEGORIES</h2>
                            <ul class="product-categories">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#">{{getDefaultValueKey($category->title)}}</a>
                                        <span
                                            class="count">( {{count($category->cartridges)}} )</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(isset($manufactures) && $manufactures!=null&&count($manufactures)>0)
                        <div class="widget widget_product_categories">
                            <h2 class="widget-title">PRODUCT MANUFACTURES</h2>
                            <ul class="product-categories">
                                @foreach($manufactures as $manufacture)
                                    <li>
                                        <a href="#">{{getDefaultValueKey($manufacture->title)}}</a>
                                        <span class="count">( {{count($manufacture->cartridges)}} )</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if(isset($colors) && $colors!=null && count($colors)>0)
                        <div class="widget widget_layered_nav">
                            <h2 class="widget-title">PRODUCT COLORS</h2>
                            <ul>
                                @foreach($colors as $color)
                                    <li>
                                        <span style="background-color: {{$color->color}};" class="attr"></span>
                                        <a href="#">{{getDefaultValueKey($color->title)}}</a>
                                        <span class="count">( {{count($color->cartridges)}} )</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(isset($types) && $types!=null && count($types)>0)
                        <div class="widget widget_layered_nav">
                            <h2 class="widget-title">PRODUCT TYPES</h2>
                            <ul>
                                @foreach($types as $type)
                                    <li>
                                        <a href="#">{{getDefaultValueKey($type->title)}}</a>
                                        <span class="count">( {{count($type->cartridges)}} )</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row margin-0">
        <div class="col-sm-6 padding-0">
            <div class="block-social">
                <div class="social">
                    @if(isset($sociallinks) && count($sociallinks)>0)
                        @foreach($sociallinks as $sociallink)
                            <a href="{{$sociallink->link}}"><i class="{{$sociallink->icon}}"></i></a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 padding-0">
            <div class="block-newsletter">
                <div class="inner">
                    <h2 class="title">Join Our Newsletter</h2>
                    <p class="subtitle">Sign up our newsletter and get more events & promotions!</p>
                    <form>
                        <input type="text" placeholder="Enter your email here" class="text-input">
                        <button class="button"><i class="fa fa-envelope-o"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') @endsection
