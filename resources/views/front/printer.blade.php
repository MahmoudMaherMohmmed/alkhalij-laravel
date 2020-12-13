@extends('front.layouts.app')

@section('title') Product @endsection

@section('style')
    <style>
        .verticalmenu-content {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main-container left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 main-content">
                    <nav class="woocommerce-breadcrumb breadcrumbs">
                        <a href="#">Home</a>
                        <a href="#">{{getDefaultValueKey($printer->category->title)}}</a>
                        <a href="#">{{getDefaultValueKey($printer->manufacture->title)}}</a>
                        {{getDefaultValueKey($printer->title)}}
                    </nav>
                    <div class="single-product">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="images kt-images-zoom">
                                    <div class="kt-easyzoom easyzoom easyzoom--with-thumbnails">
                                        <a href="{{asset('files/'.$printer->image)}}">
                                            <img src="{{asset('files/'.$printer->image)}}"
                                                 alt="{{getDefaultValueKey($printer->title)}}"
                                                 style="height: 350px;"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="summary">
                                    <h1 class="product_title entry-title">{{getDefaultValueKey($printer->title)}}</h1>
                                    <div class="rating" title="Rated 5 out of 5">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="short-descript">
                                        <p><strong>Quick Overview:</strong>
                                            {{getDefaultValueKey($printer->description)}}
                                        </p>
                                    </div>
                                    <div class="share">
                                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                                        <span class='st_googleplus_hcount' displayText='Google +'></span>
                                        <script type="text/javascript"
                                                src="http://w.sharethis.com/button/buttons.js"></script>
                                        <script type="text/javascript">stLight.options({
                                                publisher: "71bbd720-bb71-4ba5-93e5-81ec93d19019",
                                                doNotHash: true,
                                                doNotCopy: false,
                                                hashAddressBar: false
                                            });</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tabs">
                            <ul class="nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab-1">compatible Cartridges</a></li>
                                <li><a data-toggle="tab"
                                       href="#tab-2">Other {{getDefaultValueKey($printer->manufacture->title)}}
                                        Printers</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="tab-1" class="tab-panel active">
                                    @if(isset($printer->cartridges) && $printer->cartridges && count($printer->cartridges)>0)
                                        <ul class="products product-list-view">
                                            @foreach($printer->cartridges as $cartridge)
                                                <li class="product-item list">
                                                    <div class="product-inner">
                                                        <div class="thumb has-second-image col-sm-5 col-md-4 ">
                                                            <a class="thumb-inner" href="{{route('product_details',[$cartridge->slug])}}">
                                                                <img src="{{asset('files/'.$cartridge->image)}}"
                                                                     alt="{{getDefaultValueKey($cartridge->title)}}">
                                                                <img class="second-image"
                                                                     src="{{asset('files/'.$cartridge->image)}}"
                                                                     alt="{{getDefaultValueKey($cartridge->title)}}">
                                                            </a>
                                                            <a href="{{route('product_details',[$cartridge->slug])}}" title="Quick View"
                                                               class="button quick-view yith-wcqv-button">Quick View</a>
                                                        </div>
                                                        <div class="info col-sm-7 col-md-8">
                                                            <h3 class="product-name short">
                                                                <a href="{{route('product_details',[$cartridge->slug])}}">
                                                                    {{getDefaultValueKey($cartridge->title)}}
                                                                </a>
                                                            </h3>
                                                            <span class="price">{{getPrice($cartridge->customer_price)}}</span>
                                                            <div class="product-desc">
                                                                <p>{{getDefaultValueKey($cartridge->description)}}</p>
                                                            </div>
                                                            <div class="list-group-button">
                                                                <a class="button add_to_cart_button" href="#">Add to
                                                                    cart</a>
                                                                <a class="wishlist" href="#">Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div id="tab-2" class="tab-panel">
                                    @if(isset($printer->manufacture->printers) && $printer->manufacture->printers && count($printer->manufacture->printers)>0)
                                        <div class="row">
                                            @foreach($printer->manufacture->printers as $printer)
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <a href="{{route('printer_details',$printer->slug)}}">{{getDefaultValueKey($printer->title)}}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
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
