@extends('front.layouts.app')

@section('title') Home @endsection

@section('style') @endsection

@section('content')
    @if(isset($sliders) && $sliders!=null && count($sliders)>0)
        <!-- Home slide-->
        <div class="section-home-slide6">
            <div class="container">
                <div class="line-3-cc3333"></div>
                <div class="row margin-0">
                    <div class="col-sm-12 col-md-12 col-lg-3 padding-0"></div>
                    <div class="col-sm-12 col-md-9 col-lg-7 padding-0">
                        <div class="kt_home_slide slide-home6 nav-center" data-nav="false" data-autoplay="true"
                             data-loop="true"
                             data-responsive='{"0":{"items":"1"},"768":{"items":"1","nav":false},"992":{"items":"1"}}'>
                            @foreach($sliders as $slider)
                                <div class="item-slide" data-background="{{asset('files/'.$slider->image)}}"
                                     data-height="529"
                                     data-reponsive='{"320":250,"400":250,"768":400,"1024":531}'>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 padding-0 hidden-sm">
                        <div class="row margin-0">
                            <div class="col-xs-6 col-sm-6 col-md-12 padding-0">
                                <div class="kt-banner" data-height="264"
                                     data-background="{{asset('front')}}/images/banners/82.jpg"
                                     data-positionright="10px" data-positionleft="13px" data-positionbottom="33px">
                                    <a href="#" class="bg-image">Banner Bg</a>
                                </div>
                            </div>

                            <div class="col-xs-6  col-sm-6 col-md-12 padding-0">
                                <div class="kt-banner margin-top-1" data-height="264"
                                     data-background="{{asset('front')}}/images/banners/83.jpg"
                                     data-positionright="10px" data-positionleft="13px" data-positionbottom="33px">
                                    <a href="#" class="bg-image">Banner Bg</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="section-background-f6f6f6">
        <div class="container">

            <!-- Services -->
            @if(isset($services) && $services!=null && count($services)>0)
                <div class="row margin-top-30">
                    @foreach($services as $service)
                        <div class="col-sm-12 col-md-4">
                            <div class="box-icon style5 margin-bottom-30">
                                <div class="inner">
                                    <div class="icon">
                                        <span class="{{$service->icon}}"></span>
                                    </div>
                                    <div class="box-content">
                                        <h3 class="title">{{getDefaultValueKey($service->title)}}</h3>
                                        <span class="subtitle">{{getDefaultValueKey($service->description)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <!-- tab product -->
                    <div class="kt-tabs style4 kt-tab-fadeeffect">
                        <div class="tab-head">
                            <ul class="nav-tab ">
                                <li class="active">
                                    <a data-animated="fadeInUp" data-toggle="tab" href="#new_arrival">New Arrival</a>
                                </li>
                                <li>
                                    <a data-animated="fadeInUp" data-toggle="tab" href="#best_sellers">Best Sellers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-container">
                            <div id="new_arrival" class="tab-panel active">
                                @if(isset($new_arrivals) && $new_arrivals!=null && count($new_arrivals)>0)
                                    <ul class="owl-carousel nav-top-right nav-style-8 owl-custom-nav-postion"
                                        data-navigation_margin="30" data-loop="true" data-nav="true" data-dots="false"
                                        data-margin="0"
                                        data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":3},"1024":{"items":2},"1200":{"items":3}}'>
                                        @foreach($new_arrivals as $cartridge)
                                            <li class="product-item style6">
                                                <div class="product-inner">
                                                    <div class="thumb">
                                                        <a href="{{route('product_details',[$cartridge->slug])}}">
                                                            <img src="{{asset('files/'.$cartridge->image)}}"
                                                                 alt="{{getDefaultValueKey($cartridge->title)}}"
                                                                 style="height: 325px;">
                                                        </a>
                                                        <div class="group-button">
                                                            <a href="{{route('product_details',[$cartridge->slug])}}"
                                                               title="Quick View"
                                                               class="button quick-view yith-wcqv-button">
                                                                Quick View
                                                            </a>
                                                            <a class="button add_to_cart_button" href="#">Add to
                                                                cart</a>
                                                            <a class="wishlist" href="#">Wishlist</a>
                                                        </div>

                                                    </div>
                                                    <div class="info">
                                                        <h3 class="product-name short">
                                                            <a href="{{route('product_details',[$cartridge->slug])}}">
                                                                {{getDefaultValueKey($cartridge->title)}}
                                                            </a>
                                                        </h3>
                                                        <span class="price">
													        <ins>{{getPrice($cartridge->customer_price)}}</ins>
													        <del>{{getOldPrice($cartridge->customer_price)}}</del>
												        </span>
                                                        <div class="rating" title="Rated 5 out of 5">
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div id="best_sellers" class="tab-panel">
                                @if(isset($best_sellers) && $best_sellers!=null && count($best_sellers)>0)
                                    <ul class="owl-carousel nav-top-right nav-style-8 owl-custom-nav-postion"
                                        data-navigation_margin="30" data-loop="true" data-nav="true" data-dots="false"
                                        data-margin="0"
                                        data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":3},"1000":{"items":3}}'>
                                        @foreach($best_sellers as $cartridge)
                                            <li class="product-item style6">
                                                <div class="product-inner">
                                                    <div class="thumb">
                                                        <a href="{{route('product_details',[$cartridge->slug])}}">
                                                            <img src="{{asset('files/'.$cartridge->image)}}"
                                                                 alt="{{getDefaultValueKey($cartridge->title)}}"
                                                                 style="height: 325px;">
                                                        </a>
                                                        <div class="group-button">
                                                            <a href="{{route('product_details',[$cartridge->slug])}}"
                                                               title="Quick View"
                                                               class="button quick-view yith-wcqv-button">
                                                                Quick View
                                                            </a>
                                                            <a class="button add_to_cart_button" href="#">Add to
                                                                cart</a>
                                                            <a class="wishlist" href="#">Wishlist</a>
                                                        </div>

                                                    </div>
                                                    <div class="info">
                                                        <h3 class="product-name short">
                                                            <a href="{{route('product_details',[$cartridge->slug])}}">
                                                                {{getDefaultValueKey($cartridge->title)}}
                                                            </a>
                                                        </h3>
                                                        <span class="price">
													        <ins>{{getPrice($cartridge->customer_price)}}</ins>
													        <del>{{getOldPrice($cartridge->customer_price)}}</del>
												        </span>
                                                        <div class="rating" title="Rated 5 out of 5">
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                            <i class="active fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- .tab product -->
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="kt-banner margin-top-50" data-height="420" data-reponsive='{"1024":"438"}'
                         data-background="{{asset('front')}}/images/banners/86.jpg">
                        <a href="#" class="bannereffect-3 bg-image">Banner Bg</a>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="row">
                <div class="col-ts-12 col-xs-6 col-sm-6">
                    <a class="bannereffect-1 margin-top-30" href="#"><img src="{{asset('front')}}/images/banners/84.jpg"
                                                                          alt=""></a>
                </div>
                <div class="col-ts-12 col-xs-6  col-sm-6">
                    <a class="bannereffect-1 margin-top-30" href="#"><img src="{{asset('front')}}/images/banners/85.jpg"
                                                                          alt=""></a>
                </div>
            </div>
            <!-- ./Banner -->

            <!-- Hot brand -->
            @if(isset($brands) && $brands!=null && count($brands)>0)
                <div class="block-container tab-brand margin-top-30">
                    <div class="head">
                        <h3 data-head="B" class="title"><span class="text">Brand Zone</span></h3>
                    </div>
                    <div class="block-content">
                        <ul class="list-brand nav-tab kt-tab-fadeeffect">
                            @foreach($brands as $brand)
                                <li class="{{ $loop->first ? 'active' : '' }}">
                                    <a data-toggle="tab" href="#{{$brand->slug}}">
                                        <img src="{{asset('files/'.$brand->image)}}"
                                             alt="{{getDefaultValueKey($brand->title)}}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-container">
                            @foreach($brands as $brand)
                                <div id="{{$brand->slug}}" class="tab-panel {{ $loop->first ? 'active' : '' }}">
                                    @if(count($brand->cartridges)>0)
                                        <ul class="owl-carousel nav-top-right nav-style-8 owl-custom-nav-postion"
                                            data-navigation_margin="121" data-loop="true" data-nav="true"
                                            data-dots="false"
                                            data-margin="10"
                                            data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":3},"1024":{"items":4},"1200":{"items":5}}'>
                                            @foreach($brand->cartridges as $cartridge)
                                                <li class="product-item style6 no-border">
                                                    <div class="product-inner">
                                                        <div class="thumb">
                                                            <a href="{{route('product_details',[$cartridge->slug])}}">
                                                                <img src="{{asset('files/'.$cartridge->image)}}"
                                                                     alt="{{getDefaultValueKey($cartridge->title)}}"
                                                                     style="height: 325px;">
                                                            </a>
                                                            <div class="group-button">
                                                                <a href="{{route('product_details',[$cartridge->slug])}}"
                                                                   title="Quick View"
                                                                   class="button quick-view yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <a class="button add_to_cart_button" href="#">Add to
                                                                    cart</a>
                                                                <a class="wishlist" href="#">Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <h3 class="product-name short">
                                                                <a href="{{route('product_details',[$cartridge->slug])}}">
                                                                    {{getDefaultValueKey($cartridge->title)}}
                                                                </a>
                                                            </h3>
                                                            <span class="price">
										                        <ins>{{getPrice($cartridge->customer_price)}}</ins>
                                                                <del>{{getOldPrice($cartridge->customer_price)}}</del>
									                        </span>
                                                            <div class="rating" title="Rated 5 out of 5">
                                                                <i class="active fa fa-star"></i>
                                                                <i class="active fa fa-star"></i>
                                                                <i class="active fa fa-star"></i>
                                                                <i class="active fa fa-star"></i>
                                                                <i class="active fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        <!-- block recommended-->
            @if(isset($recommended_cartridges) && $recommended_cartridges!=null && count($recommended_cartridges)>0)
                <div class="block-container block-recommended margin-top-30 margin-bottom-40">
                    <div class="head">
                        <h3 data-head="R" class="title"><span class="text">Recommended Cartridges</span></h3>
                    </div>
                    <div class="block-content">
                        <ul class="owl-carousel nav-top-right nav-style-8 owl-custom-nav-postion"
                            data-navigation_margin="65"
                            data-loop="true" data-nav="true" data-dots="false" data-margin="10"
                            data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":2},"1000":{"items":3},"1200":{"items":4}}'>
                            @foreach($recommended_cartridges as $cartridge)
                                <li class="product-item style8">
                                    <div class="product-inner">
                                        <div class="thumb">
                                            <a href="{{route('product_details',[$cartridge->slug])}}">
                                                <img src="{{asset('files/'.$cartridge->image)}}"
                                                     alt="{{getDefaultValueKey($cartridge->title)}}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h3 class="product-name short">
                                                <a href="{{route('product_details',[$cartridge->slug])}}">
                                                    {{getDefaultValueKey($cartridge->title)}}
                                                </a>
                                            </h3>
                                            <span class="price">
										        <ins>{{getPrice($cartridge->customer_price)}}</ins>
										        <del>{{getOldPrice($cartridge->customer_price)}}</del>
									        </span>
                                            <div class="rating" title="Rated 5 out of 5">
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection

@section('script') @endsection
