@extends('admin.layouts.app')

@section('title') Cartridges @endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/dropify/css/dropify.min.css">

    <link rel="stylesheet" href="{{asset('admin')}}/plugins/select2/select2.css"/>
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Cartridges</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">{{isset($item) ? 'Edit Cartridge' : 'New Cartridge'}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('cartridges.index')}}" class="btn btn-warning btn-icon float-right"><i
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
                                  action="{{ isset($item) ? route('cartridges.update',$item->id) : route('cartridges.store') }}"
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
                                                   placeholder="Cartridge Title-AR"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Title-EN</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title_en"
                                                   value="{{ isset($item) ? getLangValue($item->title, 'en') : old('title_en') }}"
                                                   placeholder="Cartridge Title-EN"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Code</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="cartridge_code"
                                                   value="{{ isset($item) ? $item->cartridge_code : old('cartridge_code') }}"
                                                   placeholder="Cartridge code"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>ID</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="cartridge_id"
                                                   value="{{ isset($item) ? $item->cartridge_id : old('cartridge_id') }}"
                                                   placeholder="Cartridge ID"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-AR</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="form-control" name="description_ar"
                                                      placeholder="Cartridge Description-AR"
                                                      rows="8"
                                                      required>{{ isset($item) ? getLangValue($item->description, 'ar') : old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-EN</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="form-control" name="description_en"
                                                      placeholder="Cartridge Description-EN"
                                                      rows="8"
                                                      required>{{ isset($item) ? getLangValue($item->description, 'en') : old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Category</label>
                                        <div class="form-group form-float">
                                            <select name="category_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose Category --
                                                </option>
                                                @if(isset($categories) && $categories!=null)
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}" {{ isset($item) && $item->category_id == $category->id ? "Selected" : "" }}>
                                                            {{getLangValue($category->title, 'en')}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Manufacture</label>
                                        <div class="form-group form-float">
                                            <select name="manufacture_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose Manufacture --
                                                </option>
                                                @if(isset($manufactures) && $manufactures!=null)
                                                    @foreach($manufactures as $manufacture)
                                                        <option
                                                            value="{{$manufacture->id}}" {{ isset($item) && $item->manufacture_id == $manufacture->id ? "Selected" : "" }}>
                                                            {{getLangValue($manufacture->title, 'en')}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Compatibility Type</label>
                                        <div class="form-group form-float">
                                            <select name="type_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->type_id == 1 ? "disabled" : "" }}>
                                                    -- Choose Compatibility Type --
                                                </option>
                                                @if(isset($types) && $types!=null)
                                                    @foreach($types as $type)
                                                        <option
                                                            value="{{$type->id}}" {{ isset($item) && $item->type_id == $type->id ? "Selected" : "" }}>
                                                            {{getLangValue($type->title, 'en')}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Color</label>
                                        <div class="form-group form-float">
                                            <select name="color_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->color_id == 1 ? "disabled" : "" }}>
                                                    -- Choose Color --
                                                </option>
                                                @if(isset($colors) && $colors!=null)
                                                    @foreach($colors as $color)
                                                        <option
                                                            value="{{$color->id}}" {{ isset($item) && $item->color_id == $color->id ? "Selected" : "" }}>
                                                            {{getLangValue($color->title, 'en')}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label>Page Yield</label>
                                        <div class="form-group form-float">
                                            <input type="number" class="form-control" name="page_yield"
                                                   value="{{ isset($item) ? $item->page_yield : old('page_yield') }}"
                                                   placeholder="Cartridge Page Yield"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label>Available Quantity</label>
                                        <div class="form-group form-float">
                                            <input type="number" class="form-control" name="quantity"
                                                   value="{{ isset($item) ? $item->quantity : old('quantity') }}"
                                                   placeholder="Cartridge Available Quantity"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label>Admin Price</label>
                                        <div class="form-group form-float">
                                            <input type="number" class="form-control" name="admin_price"
                                                   value="{{ isset($item) ? $item->admin_price : old('admin_price') }}"
                                                   placeholder="Cartridge Admin Price"
                                                   min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label>Staff Price</label>
                                        <div class="form-group form-float">
                                            <input type="number" class="form-control" name="staff_price"
                                                   value="{{ isset($item) ? $item->staff_price : old('staff_price') }}"
                                                   placeholder="Cartridge Staff Price"
                                                   min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label>Customer Price</label>
                                        <div class="form-group form-float">
                                            <input type="number" class="form-control" name="customer_price"
                                                   value="{{ isset($item) ? $item->customer_price : old('customer_price') }}"
                                                   placeholder="Cartridge Customer Price"
                                                   min="0" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12"
                                        id="compatible_printers_html_data" style="padding-bottom: 2px;"></div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-11 col-md-11 col-sm-11">
                                        <label>Compatible Printers</label>
                                        <div class="form-group form-float">
                                            <select name="compatible_printer" id="compatible_printer"
                                                    class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option value="-1">-- Choose Printer --</option>
                                                @if(isset($printers) && $printers!=null && count($printers)>0)
                                                    @foreach($printers as $printer)
                                                        <option value="{{$printer->id}}">
                                                            {{getDefaultValueKey($printer->title)}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1" style="padding-left: 0px;margin-top: 28px;">
                                        <a id="compatible_printer_submit" class="btn btn-success btn-icon float-right"
                                           style="width: 100%; margin: 0px;">
                                            <i class="zmdi zmdi-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="compatible_printers_hidden_inputs"></div>


                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Image</label>
                                        <div class="form-group form-float">
                                            <input type="file" class="dropify" name="image"
                                                   data-default-file="@isset($item){{ url('files/',$item->image) }}@endisset">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Recommended</label>
                                        <div class="form-group form-float">
                                            <select name="recommended" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->recommended == 1 ? "disabled" : "" }}>
                                                    -- Choose Recommendation Status --
                                                </option>
                                                <option
                                                    value="1" {{ isset($item) && $item->recommended == 1 ? "Selected" : "" }}>
                                                    ON
                                                </option>
                                                <option
                                                    value="0" {{ isset($item) && $item->recommended == 0 ? "Selected" : "" }}>
                                                    OFF
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Status</label>
                                        <div class="form-group form-float">
                                            <select name="status" class="form-control show-tick ms select2"
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
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="{{asset('admin')}}/plugins/dropify/js/dropify.min.js"></script>

    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/form-validation.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/dropify.js"></script>

    <script src="{{asset('admin')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="{{asset('admin')}}/plugins/multi-select/js/jquery.multi-select.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-spinner/js/jquery.spinner.js"></script>
    <script src="{{asset('admin')}}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="{{asset('admin')}}/plugins/nouislider/nouislider.js"></script>
    <script src="{{asset('admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/advanced-form-elements.js"></script>

    <script>
        var compatible_printers = [];
        var compatible_printers_text = [];

        $(window).on("load", function () {
            @if(isset($item)&&$item!=null)
            @foreach($item->printers as $printer)
            compatible_printers.push({{$printer->id}});
            compatible_printers_text.push('{{getDefaultValueKey($printer->title)}}');
            @endforeach

            //set html to hidden_inputs_html
            compatiblePrintersHiddenInputHTML();

            //set html to compatible_printer
            compatiblePrintersHTML();
            @endif
        });

        $("#compatible_printer_submit").click(function () {
            //get compatible_printer value
            var compatible_printer = $('#compatible_printer').val();
            var compatible_printer_text = $('#compatible_printer option:selected').text();

            if (compatible_printer != '' && compatible_printer != undefined) {
                if (compatible_printer != -1) {
                    if (!compatible_printers.includes(compatible_printer)) {
                        //push data new compatible_printer to compatible_printers array
                        compatible_printers.push(compatible_printer);
                        compatible_printers_text.push(compatible_printer_text);

                        //set html to hidden_inputs_html
                        compatiblePrintersHiddenInputHTML();

                        //set html to compatible_printer
                        compatiblePrintersHTML();
                    } else {
                        alert('This Printer Data is already exist in the Compatible Printers.');
                    }
                } else {
                    alert('Please Select Printer Data.');
                }
            }
        });

        function deleteCompatiblePrinter(compatible_printer) {
            //pop data new compatible_printer to compatible_printers array
            compatible_printers.splice(compatible_printer, 1);
            compatible_printers_text.splice(compatible_printer, 1);

            //set html to hidden_inputs_html
            compatiblePrintersHiddenInputHTML();

            //set html to features_html
            compatiblePrintersHTML()
        }

        function compatiblePrintersHiddenInputHTML() {
            var compatible_printers_hidden_inputs_html = "";
            $.each(compatible_printers, function (key, value) {
                compatible_printers_hidden_inputs_html += '<input type="hidden" name="hidden_compatible_printers[]" value="' + value + '">'
            });
            $("#compatible_printers_hidden_inputs").html(compatible_printers_hidden_inputs_html);
        }

        function compatiblePrintersHTML() {
            var compatible_printers_html = "";

            compatible_printers_html += '<ul>';
            $.each(compatible_printers_text, function (key, value) {
                compatible_printers_html += '<li>' + value + '<span class="zmdi zmdi-close" style="width: 10px; height: 10px; background-color: red;  color: #fff; border-radius: 50%; font-size: 9px; margin-left: 10px; cursor: pointer; padding-left: 2px;" onclick="deleteCompatiblePrinter(\'' + key + '\')"></span></li>'
            });
            compatible_printers_html += '</ul>';

            $("#compatible_printers_html_data").html(compatible_printers_html);
        }
    </script>
@endsection
