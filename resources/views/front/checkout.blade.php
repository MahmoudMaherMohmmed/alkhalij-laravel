@extends('front.layouts.app')

@section('title') Checkout @endsection

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
                        Checkout
                    </nav>
                    <form class="checkout">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="block-form">
                                    <h3 class="form-heading">Billing Address</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Name"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Last Name"></p>
                                        </div>
                                    </div>
                                    <p>
                                        <input type="text" placeholder="Company Name">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="Address">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="Town / City">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="State / Country">
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Post Code"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Phone"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-form order-review">
                                    <h3 class="form-heading">Your Order</h3>
                                    <table class="shop_table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="product-name">Oversize Fit Trousers Sneaker</td>
                                            <td class="product-total"><span class="amount">$113.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="product-name">Oversize Fit Trousers Sneaker</td>
                                            <td class="product-total"><span class="amount">$113.00</span></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">$501.00</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>Internaltional</td>
                                        </tr>
                                        <tr class="cart-coupon">
                                            <th>Coupon Discount</th>
                                            <td>10%</td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount">$501.00</span></strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <button class="button primary">Proceed to CHECK OUT</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="block-form payment">
                                    <h3 class="form-heading">Ship to a different address</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Name"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Last Name"></p>
                                        </div>
                                    </div>
                                    <p>
                                        <input type="text" placeholder="Company Name">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="Address">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="Town / City">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="State / Country">
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Post Code"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><input type="text" placeholder="Phone"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-form">
                                    <h3 class="form-heading">Your Payment</h3>
                                    <ul class="payment_methods">
                                        <li>
                                            <input type="radio" class="input-radio" name="payment_method" value="bacs">
                                            <label>Direct Bank Transfer</label>
                                            <div class="payment_box">
                                                <p>Nulla laoreet ipsum dignissim magna maximus, vitae euismod turpis iaculis
                                                    sedtra lacus sit amet dui consequat dignissim bibendum ullamcorper
                                                    sem.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <input type="radio" class="input-radio" name="payment_method" value="bacs">
                                            <label>Cash on delivery</label>
                                            <div class="payment_box">
                                                <p>Nulla laoreet ipsum dignissim magna maximus, vitae euismod turpis iaculis
                                                    sedtra lacus sit amet dui consequat dignissim bibendum ullamcorper
                                                    sem.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <input type="radio" class="input-radio" name="payment_method" value="bacs">
                                            <label>Paypal</label>
                                            <div class="payment_box">
                                                <p>Nulla laoreet ipsum dignissim magna maximus, vitae euismod turpis iaculis
                                                    sedtra lacus sit amet dui consequat dignissim bibendum ullamcorper
                                                    sem.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
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
