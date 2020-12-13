@extends('front.layouts.app')

@section('title') Contact Us @endsection

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
                Contact Us
            </nav>
        </div>
        <div class="container">
            <div class="google-map">
                <div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;">
                    <iframe height="355"
                            src="https://www.google.com/maps/embed/v1/place?q=H%c3%a0+Noi,+Hanoi,+Vietnam&amp;key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                </div>
            </div>
            <div class="form-contact">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="form-title">Contact Us</h3>
                        <div id="message-box-conact"></div>
                        <div class="row">
                            <form action="" method="post">
                                <div class="col-sm-4">
                                    <p>
                                        <input id="name" name="name" type="text" placeholder="Name*"/>
                                    </p>
                                    <p>
                                        <input id="email" name="email" type="text" placeholder="Email*"/>
                                    </p>
                                    <p>
                                        <input id="subject" name="subject" type="text" placeholder="Subject*"/>
                                    </p>
                                </div>
                                <div class="col-sm-8">
                                    <textarea id="content" name="message" placeholder="Message" rows="7"></textarea>
                                </div>
                                <button id="btn-send-contact" class="button pull-right primary">Send message</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="form-title">Address</h3>
                        @if(isset($website_setting->address) && $website_setting->address!=null)
                            <p>
                                <label>Address</label>
                                {{getDefaultValueKey($website_setting->address)}}
                            </p>
                        @endif

                        <p>
                            <label>Phone numbers</label>
                            {{isset($website_setting->phone_1) && $website_setting->phone_1!=null ? $website_setting->phone_1.' | ' : ''}}
                            {{isset($website_setting->phone_2) && $website_setting->phone_2!=null ? $website_setting->phone_1 : ''}}
                        </p>

                        <p>
                            <label>Emails</label>
                            {{isset($website_setting->email_1) && $website_setting->email_1!=null ? $website_setting->email_1.' | ' : ''}}
                            {{isset($website_setting->email_2) && $website_setting->email_2!=null ? $website_setting->email_1 : ''}}
                        </p>
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
