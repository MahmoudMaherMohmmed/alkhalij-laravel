@extends('front.layouts.app')

@section('title') About Us @endsection

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
            <nav class="woocommerce-breadcrumb breadcrumbs">
                <a href="#">Home</a>
                About Us
            </nav>
        </div>
        <div class="page-banner bg-parallax"></div>

        @if(isset($members) && $members!=null && count($members)>0)
            <div class="heading-section style2 text-center margin-top-50 margin-bottom-20">
                <h3 class="title">OUR TEAM</h3>
                <span class="subtitle">Welcome to Lucky - Beautiful Creative Ecommerce Template!</span>
            </div>
            <div class="section-team">
                <div class="container">
                    <div class="owl-carousel nav-center nav-style-2" data-loop="true" data-nav="true" data-dots="false"
                         data-margin="30" data-responsive='{"0":{"items":"1"},"768":{"items":"3"},"992":{"items":"4"}}'>
                        @foreach($members as $member)
                            <div class="team-item">
                                <div class="team">
                                    <div class="content">
                                        <div class="avatar">
                                            <img src="{{asset('files/'.$member->image)}}" alt="{{getDefaultValueKey($member->name)}}">
                                        </div>
                                        <h3 class="name">{{getDefaultValueKey($member->name)}}</h3>
                                        <span class="position">{{$member->job}}</span>
                                        <div class="social">
                                            <a href="{{isset($member->facebook_url)&&$member->facebook_url!=null ? $member->facebook_url : 'javascript:void(0);'}}"><i class="fa fa-facebook"></i></a>
                                            <a href="{{isset($member->google_url)&&$member->google_url!=null ? $member->google_url : 'javascript:void(0);'}}"><i class="fa fa-google-plus"></i></a>
                                            <a href="{{isset($member->twitter_url)&&$member->twitter_url!=null ? $member->twitter_url : 'javascript:void(0);'}}"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
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
