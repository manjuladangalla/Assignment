@extends('layouts.app')

@section('styles')
<!-- page specific styles here -->
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-datepicker3.min.css') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Add New Class</h4>
            </div>

            <div class="widget-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form-horizontal" id="validation-form" method="POST" action="{{ route('class_save') }}">
                    @csrf
                    <div class="widget-main">
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Name</label>
                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <input type="text" name="name" id="name" class="col-xs-12 col-sm-6" placeholder="Name Of Class"/>
                                </div>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                   for="year">Year</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <input type="number" name="year" id="year" class="col-xs-12 col-sm-4" placeholder="Year Of Class"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer wizard-actions">
                        <a class="btn btn-sm btn-warning btn-prev" href="{{ route('class_add') }}">
                            <i class="ace-icon fa fa-times"></i>
                            Cancel
                        </a>

                        <button class="btn btn-success btn-sm btn-next" data-last="Finish" type="submit">
                            Save
                            <i class="ace-icon fa fa-save"></i>
                        </button>

                        <a class="btn btn-info btn-sm pull-left" href="{{ route('home') }}">
                            <i class="ace-icon fa fa-backward"></i>
                            Back
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- page specific link script here -->
<script src="{{ asset('js/backend_js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-additional-methods.min.js') }}"></script>

@endsection

@section('inlineScript')
<!-- page specific inline script here -->
<script type="text/javascript">
    jQuery(function ($) {

        $('#validation-form').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                name: {
                    required: true
                },
                year: {
                    required: true,
                }

            },

            messages: {},


            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },

            errorPlacement: function (error, element) {
                if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                    var controls = element.closest('div[class*="col-"]');
                    if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                }
                else if (element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if (element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                }
                else error.insertAfter(element.parent());
            },

            submitHandler: function (form) {
                form.submit();
            },
            invalidHandler: function (form) {
            }
        });
    });


</script>
@endsection