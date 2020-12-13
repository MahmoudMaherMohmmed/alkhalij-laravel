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
                        <a href="#">{{getDefaultValueKey($cartridge->category->title)}}</a>
                        <a href="#">{{getDefaultValueKey($cartridge->manufacture->title)}}</a>
                        {{getDefaultValueKey($cartridge->title)}}
                    </nav>
                    <div class="single-product">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="images kt-images-zoom">
                                    <div class="kt-easyzoom easyzoom easyzoom--with-thumbnails">
                                        <a href="{{asset('files/'.$cartridge->image)}}">
                                            <img src="{{asset('files/'.$cartridge->image)}}"
                                                 alt="{{getDefaultValueKey($cartridge->title)}}"
                                                 style="height: 350px;"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="summary">
                                    <h1 class="product_title entry-title">{{getDefaultValueKey($cartridge->title)}}
                                        ({{$cartridge->cartridge_id}})</h1>
                                    <span class="price">{{getPrice($cartridge->customer_price)}}</span>
                                    <p class="stock out-of-stock"><label>Available:</label> <i class="fa fa-check"></i>
                                        In stock </p>
                                    <div class="rating" title="Rated 5 out of 5">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="short-descript">
                                        <p><strong>Quick Overview:</strong>
                                            {{getDefaultValueKey($cartridge->description)}}
                                        </p>
                                    </div>
                                    <div class="quantity">
                                        <label>Select Quantity:</label>
                                        <input type="text" data-step="1" data-min="" data-max="" name="quantity"
                                               value="01" title="Qty" class="input-text qty text" size="4">
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
                                    <button type="submit" class="single_add_to_cart_button button alt">
                                        Add to cart
                                    </button>
                                    <a href="#" class="button wishlist"><span class="flaticon-heart295"></span></a>
                                    <a href="#" class="button mailto"><span class="flaticon-new4"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-tabs">
                            <ul class="nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Product Descriptions</a></li>
                                <li><a data-toggle="tab" href="#tab-2">compatible Printers</a></li>
                                <li><a data-toggle="tab" href="#tab-3">Customer Reviews</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="tab-1" class="tab-panel active">
                                    <h3>Cartridge Description</h3>
                                    <p>{{getDefaultValueKey($cartridge->description)}}</p>

                                    <h3>Specifications</h3>
                                    <table>
                                        <tr>
                                            <td>Page Yield</td>
                                            <td>{{$cartridge->page_yield}} page</td>
                                        </tr>
                                        <tr>
                                            <td>GTIN</td>
                                            <td>{{$cartridge->cartridge_id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>{{getDefaultValueKey($cartridge->color->title)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td>{{getDefaultValueKey($cartridge->manufacture->title)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Compatibility</td>
                                            <td>{{getDefaultValueKey($cartridge->type->title)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Condition</td>
                                            <td>New</td>
                                        </tr>
                                    </table>

                                </div>
                                <div id="tab-2" class="tab-panel">
                                    @if(isset($cartridge->printers) && $cartridge->printers && count($cartridge->printers)>0)
                                        <ul>
                                            @foreach($cartridge->printers as $printer)
                                                <li>
                                                    <a href="{{route('printer_details',$printer->slug)}}">{{getDefaultValueKey($printer->title)}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div id="tab-3" class="tab-panel">
                                    <div id="reviews">
                                        <div id="comments">
                                            <h2 class="review-title">2 reviews for ArchitectMade Oscar Figure</h2>
                                            <ol class="commentlist">
                                                <li class="comment">
                                                    <div class="comment_container">
                                                        <img alt="" src="{{asset('front')}}/images/avatars/1.png"
                                                             class="avatar">
                                                        <div class="comment-text">
                                                            <div class="meta">
                                                                <strong>Stuart</strong>-
                                                                <time datetime="2013-06-07T13:01:25+00:00">June 7,
                                                                    2013
                                                                </time>
                                                                <div class="rating" title="Rated 5 out of 5">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="description">
                                                                <p>This will go great with my Hoodie that I ordered a
                                                                    few weeks ago.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment_container">
                                                        <img alt="" src="{{asset('front')}}/images/avatars/2.png"
                                                             class="avatar">
                                                        <div class="comment-text">
                                                            <div class="meta">
                                                                <strong>Stuart</strong>-
                                                                <time datetime="2013-06-07T13:01:25+00:00">June 7,
                                                                    2013
                                                                </time>
                                                                <div class="rating" title="Rated 5 out of 5">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="description">
                                                                <p>This will go great with my Hoodie that I ordered a
                                                                    few weeks ago.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div id="review_form">
                                            <div class="comment-respond">
                                                <h3 class="comment-reply-title">Add a review</h3>
                                                <form class="comment-form">
                                                    <p>
                                                        <label>Name</label>
                                                        <input type="text">
                                                    </p>
                                                    <p>
                                                        <label>Email</label>
                                                        <input type="email">
                                                    </p>
                                                    <p>
                                                        <label>Comment</label>
                                                        <textarea rows="8"></textarea>
                                                    </p>
                                                    <p>
                                                        <input name="submit" type="submit" id="submit" class="submit"
                                                               value="Submit">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php $related_products = \App\Cartridge::where('category_id', $cartridge->category_id)->where('manufacture_id',$cartridge->manufacture_id)->where('status',1)->limit(10)->get() @endphp
                    @if(isset($related_products) && $related_products!=null && count($related_products)>0)
                        <div class="related products">
                            <div class="heading-section text-center">
                                <h3 class="title">Related Products</h3>
                            </div>
                            <ul class="owl-carousel nav-center nav-style-1" data-loop="true" data-nav="true"
                                data-dots="false" data-margin="10"
                                data-responsive='{"0":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"}}'>
                                @foreach($related_products as $cartridge)
                                    <li class="product-item">
                                        <div class="product-inner">
                                            <div class="thumb has-second-image">
                                                <a href="{{route('product_details',[$cartridge->slug])}}">
                                                    <img src="{{asset('files/'.$cartridge->image)}}"
                                                         alt="{{getDefaultValueKey($cartridge->title)}}">
                                                    <img class="second-image"
                                                         src="{{asset('files/'.$cartridge->image)}}"
                                                         alt="{{getDefaultValueKey($cartridge->title)}}">
                                                </a>
                                                <div class="group-button">
                                                    <a class="wishlist" href="#">Wishlist</a>
                                                    <a class="button add_to_cart_button" href="#">Add to cart</a>
                                                    <a class="compare button" href="#">Compare</a>
                                                </div>
                                                <div class="flash">
                                                    <span class="new">New</span>
                                                </div>
                                                <a href="{{route('product_details',[$cartridge->slug])}}"
                                                   title="Quick View"
                                                   class="button quick-view yith-wcqv-button">Quick
                                                    View</a>
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
