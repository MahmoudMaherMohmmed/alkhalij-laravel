@extends('front.layouts.app')

@section('title') 404 @endsection

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
                <div class="text-center page-404">
                    <h1 class="heading">404</h1>
                    <h2 class="title">Oops! That page can't be found.</h2>
                    <p>Sorry, but the page you are looking for is not found. Please, make sure you have typed the
                        current URL.</p>
                    <a class="button primary" href="http://kutethemes.net/wordpress/boutique">Go to Home</a>
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
