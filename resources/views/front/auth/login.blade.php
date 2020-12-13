@extends('front.layouts.home')

@section('style')
    <style>
        fieldset {
            border: none;
            margin: 20px 0 0 0;
            padding: 0;
            position: relative;
        }

        fieldset .fa {
            position: absolute;
            left: 5px;
            color: #513a4a;
            top: 13px;
            left: 16px;
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            transform: translate(0, 0);
        }

        input {
            padding: 11px 15px 11px 40px !important;
            width: 100% !important;
            height: 40px !important;
            font-family: 'Lora', serif !important;
            display: block !important;
            margin: 0 !important;
            color: #513A4A !important;
            font-size: 15px !important;
            font-weight: 400 !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="row" style="max-width:100%; background-color: #eae3d5;">
        <div style="margin: 100px;">
            <h3 style="font-weight: bold; color: #6a0120; padding-bottom: 1px; text-align: center; font-size: 20px;">
                تسجيل
                الدخول</h3>
            <form action="{{route('customer.login')}}" method="post">
                <fieldset>
                    <i class="fa fa-envelope-o"></i><input name="email" placeholder="Your Email Address" type="text"
                                                           class="placeholder" autofocus>
                </fieldset>
                <fieldset>
                    <i class="fa fa-lock"></i><input name="password" placeholder="Your Password" type="password"
                                                     class="placeholder">
                </fieldset>
                @csrf
                <p style="text-align: center;">
                    <button class="button" name="submit" type="submit">تسجيل الدخول</button>
                </p>

                @if ($errors->any())
                    <div style="background-color: #81052a; color: #fff; padding: 20px 10px 1px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

@section('script') @endsection