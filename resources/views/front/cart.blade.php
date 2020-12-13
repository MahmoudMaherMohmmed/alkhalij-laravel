@extends('front.layouts.app')

@section('title') Cart @endsection

@section('style')
    <style>
        .verticalmenu-content {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main-container no-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 main-content">
                    <nav class="woocommerce-breadcrumb breadcrumbs">
                        <a href="#">Home</a>
                        Shoping cart
                    </nav>

                    <div class="block-form">
                        <table class="shop_table cart">
                            <thead>
                            <tr>
                                <th class="product">Products/Price</th>
                                <th>Available</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product">
                                    <img class="product-thumb" src="{{asset('front')}}/images/products/14.jpg" alt="">
                                    <div class="product-info">
                                        <h3 class="product-name"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
                                        <span class="product-price">$75.00</span>
                                    </div>
                                </td>
                                <td class="stock">
                                    <span class="in-stock">In stock!</span>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <input type="text" data-step="1" data-min="0" data-max="" value="1" title="Qty"
                                               class="input-text qty text" size="4">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">$113.00</span>
                                </td>
                                <td class="product-remove">
                                    <a class="remove" href="#"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="product">
                                    <img class="product-thumb" src="{{asset('front')}}/images/products/14.jpg" alt="">
                                    <div class="product-info">
                                        <h3 class="product-name"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
                                        <span class="product-price">$75.00</span>
                                    </div>
                                </td>
                                <td class="stock">
                                    <span class="in-stock">In stock!</span>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <input type="text" data-step="1" data-min="0" data-max="" value="1" title="Qty"
                                               class="input-text qty text" size="4">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">$113.00</span>
                                </td>
                                <td class="product-remove">
                                    <a class="remove" href="#"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2" class="order-total">Total: $150.00</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="block-form-footer">
                            <button class="button">Update SHOPPING CART</button>
                            <button class="button pull-right primary">Proceed to CHECK OUT</button>
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
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
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
