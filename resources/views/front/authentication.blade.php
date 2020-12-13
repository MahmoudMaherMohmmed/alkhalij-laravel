@extends('front.layouts.app')

@section('title') Login @endsection

@section('style')
    <style>
        .verticalmenu-content {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main-container no-sidebar no-padding">
        <div class="container">
            <nav class="woocommerce-breadcrumb breadcrumbs">
                <a href="#">Home</a>
                Authentication
            </nav>
            <div class="form-authentication">
                <div class="form-register">
                    <h3 class="title">Create an Account</h3>
                    <p>Please enter your email address to create an account!</p>
                    <p><input type="text" placeholder="Your email"></p>
                    <button class="button primary">Create</button>
                </div>
                <div class="form-login">
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf

                        <h3 class="title">Already Registered?</h3>
                        <p>If you have an account please enter the username & password here!</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p style="margin-bottom: 0px;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <p>
                            <input type="email" name="email" placeholder="Your email">
                        </p>
                        <p>
                            <input type="password" name="password" placeholder="Your password">
                        </p>
                        <label for="rememberme" class="inline">
                            <input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember me
                        </label>
                        <button class="button primary">Login</button>
                    </form>
                </div>
            </div>
            <div class="form-authentication-footer">
                Forgot your password ?<a href="#"> Click Here</a>
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
