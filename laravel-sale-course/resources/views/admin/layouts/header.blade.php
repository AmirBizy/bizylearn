<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        @php
            $web_setting = App\Models\WebSetting::first();
        @endphp
        <link rel="shortcut icon" href="{{ url('public/web_images/'.$web_setting->logo) }}">

        <title>مدیریت | @yield('title')</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{ url('assets/admin/plugins/morris/morris.css') }}">

        <!-- App css -->
        <link href="{{ url('assets/admin/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin/css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('MD.BootstrapPersianDateTimePicker-master-bs4/dist/jquery.md.bootstrap.datetimepicker.style.css') }}" rel="stylesheet"/>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="{{ url('assets/admin/js/modernizr.min.js') }}"></script>
        <script src="{{ url('ckeditor/ckeditor.js') }}"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left mb-5">
                    <a href="{{ route('home.index') }}" target="_blank" class="logo"><span style="font-family: 'iran'">بیزی لرن<span></span></span><i class="zmdi zmdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">داشبورد</h4>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                @include('admin.layouts.sidebar')
            </div>
            <!-- Left Sidebar End -->
