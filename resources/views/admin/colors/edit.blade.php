@extends('admin.layouts.app')

@section('title') Colors @endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css"/>

    <link rel="stylesheet" href="{{asset('admin')}}/plugins/dropify/css/dropify.min.css">
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Colors</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cartridge Settings</a></li>
                        <li class="breadcrumb-item active">{{isset($item) ? 'Edit Colors' : 'New Colors'}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('colors.index')}}" class="btn btn-warning btn-icon float-right"><i
                            class="zmdi zmdi-mail-reply"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation"
                                  class="form-horizontal"
                                  method="POST"
                                  action="{{ isset($item) ? route('colors.update',$item->id) : route('colors.store') }}"
                                  enctype="multipart/form-data">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session()->has('msg'))
                                    <div class="alert alert-success">
                                        {{ session()->get('msg') }}
                                    </div>
                                @endif

                                @csrf

                                @isset($item)
                                    <input type="hidden" name="_method" value="PUT"/>
                                @endisset

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Title-AR</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title_ar"
                                                   value="{{ isset($item) ? getLangValue($item->title, 'ar') : old('title_ar') }}"
                                                   placeholder="Type Title-AR"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Title-EN</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title_en"
                                                   value="{{ isset($item) ? getLangValue($item->title, 'en') : old('title_en') }}"
                                                   placeholder="Type Title-EN"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-AR</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="form-control" name="description_ar"
                                                      placeholder="Type Description-AR"
                                                      rows="8">{{ isset($item) ? getLangValue($item->description, 'ar') : old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-EN</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="form-control" name="description_en"
                                                      placeholder="Type Description-EN"
                                                      rows="8">{{ isset($item) ? getLangValue($item->description, 'en') : old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label style="margin-bottom: 0px;">Color</label>
                                        <div class="form-group form-float">
                                            <div class="input-group colorpicker">
                                                <input type="text" class="form-control" name="color"
                                                       value={{ isset($item) ? $item->color : '#0000' }}
                                                       required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><span
                                                            class="input-group-addon"> <i></i> </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Status</label>
                                        <div class="form-group form-float">
                                            <select name="status" class="form-control show-tick ms"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose Status --
                                                </option>
                                                <option
                                                    value="1" {{ isset($item) && $item->status == 1 ? "Selected" : "" }}>
                                                    ON
                                                </option>
                                                <option
                                                    value="0" {{ isset($item) && $item->status == 0 ? "Selected" : "" }}>
                                                    OFF
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class=" btn btn-raised btn-primary waves-effect" type="submit">
                                            SUBMIT
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Plugin Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="{{asset('admin')}}/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{asset('admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('admin')}}/plugins/multi-select/js/jquery.multi-select.js"></script>
    <script src="{{asset('admin')}}/plugins/nouislider/nouislider.js"></script>
    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/form-validation.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/dropify.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/advanced-form-elements.js"></script>
@endsection
