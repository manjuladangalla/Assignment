<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ URL::asset('css/backend_css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/backend_css/ace.min.css')}}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ URL::asset('css/backend_css/ace-part2.min.css')}}" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-rtl.min.css')}}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-ie.min.css')}}" />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('css/backend_js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('css/backend_js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="login-layout blur-login">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                            <span class="red">Manjula</span>
                            <span class="white" id="id-text2">Assignment</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; Apple Holidays</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Retrieve Password
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Enter your email and to receive instructions
                                    </p>

                                    @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                    <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                                @endif
                                            </label>

                                            <div class="clearfix">
                                                <button type="submit" class="pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">{{ __('Send Password Reset Link') }}</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->
                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="{{ url('/') }}"  class="back-to-login-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            Back to login
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                    </div><!-- /.position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('css/backend_js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('css/backend_js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('css/backend_js/jquery.mobile.custom.min.js') }}'></script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">

</script>
</body>
</html>

