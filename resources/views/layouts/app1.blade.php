<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{asset('css/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <header class="fixed-top btn-dark" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i></a>
                <a class="navbar-brand" href={{ url('/') }}>
                    <span class="logo-text">
                                 {{ config('app.name', 'BIG SCREEN') }}
                    </span>
                </a>
                @guest
                @else
                    <ul class="navbar-nav float-right">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </div>
        </nav>
    </header>
{{--    @guest--}}
{{--    @else--}}
{{--        <aside class="left-sidebar fixed-top" data-sidebarbg="skin5">--}}
{{--            <!-- Sidebar scroll-->--}}
{{--            <div class="scroll-sidebar">--}}
{{--                <!-- Sidebar navigation-->--}}
{{--                <nav class="sidebar-nav">--}}
{{--                    <ul id="sidebarnav" class="p-t-30">--}}
{{--                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
{{--                                                    href="index.html" aria-expanded="false"><i--}}
{{--                                        class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
{{--                                                    href="charts.html" aria-expanded="false"><i--}}
{{--                                        class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--                <!-- End Sidebar navigation -->--}}
{{--            </div>--}}
{{--            <!-- End Sidebar scroll-->--}}
{{--        </aside>--}}
{{--@endguest--}}


<!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
@yield('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
{{--        <div class="page-breadcrumb">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 d-flex no-block align-items-center">--}}
{{--                    <h4 class="page-title">Dashboard-2</h4>--}}
{{--                    <div class="ml-auto text-right">--}}
{{--                        <nav aria-label="breadcrumb">--}}
{{--                            <ol class="breadcrumb">--}}
{{--                                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">Library</li>--}}
{{--                            </ol>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
<!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
{{--        <div class="container-fluid">--}}

{{--        </div>--}}
<!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
{{--        <footer class="footer text-center">--}}
{{--            All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.--}}
{{--        </footer>--}}
<!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
</body>
</html>