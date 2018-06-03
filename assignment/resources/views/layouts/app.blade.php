<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }} - home</title>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- page specific plugin styles -->
    @yield('styles')
    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('css/backend_css/fonts.googleapis.com.css') }}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-part2.min.css') }}" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-skins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-rtl.min.css') }}"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('css/backend_css/ace-ie.min.css') }}"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('js/backend_js/ace-extra.min.js') }}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('js/backend_js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default  ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{ url('/') }}" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    {{ config('app.name', 'Laravel') }}
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('images/backend_images/avatars/avatar2.png') }}" alt="Profile Picture"/>
                        <span class="user-info">
									<small>Welcome,</small>
									{{ Auth::user()->name }}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="">
                <a href="{{ route ('home') }}">
                    <i class="menu-icon fa fa-home"></i>
                    <span class="menu-text"> Home </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="{{ route ('classes') }}">
                    <i class="menu-icon fa fa-university"></i>
                    <span class="menu-text"> Classes </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="{{ route('parents') }}">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> Parents </span>
                </a>
                <b class="arrow"></b>
            </li>
            @can('isAdmin')
            <li class="">
                <a href="{{ route('student_parent_add', null, null) }}">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> Student/Parents </span>
                </a>
                <b class="arrow"></b>
            </li>
            @endcan

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
               data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{ url('/home') }}">Home</a>
                    </li>

                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        @yield('content')
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
                <span class="bigger-120">
                    <span class="blue bolder">Manjula</span>
                    Assignment &copy; manjuladangalla@gmail.com
                </span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('js/backend_js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('js/backend_js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('js/backend_js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
</script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
@yield('script')
<!-- ace scripts -->

<script src="{{ asset('js/backend_js/ace-elements.min.js') }}"></script>
<script src="{{ asset('js/backend_js/ace.min.js') }}"></script>

<!-- inline scripts related to this page -->

@yield('inlineScript')
</body>
</html>

