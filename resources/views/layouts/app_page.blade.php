<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "{{ asset('images/logo.jpg') }}" type = "image/x-icon">  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">

    <style>
    .banner-left{
        width: 50%;
        text-align:center;
    }
    .banner-center{
        width: 100%;
    }

    .banner-ritht{
        width: 100%;
    }

    @media (max-width: 768px) {
        .banner-left{
            width: 100%;
            text-align:center;
        }
        .banner-center{
            width: 100%;
        }
    }

    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <div class="nav-custom-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-8 text-right">
                        <ul>
                            @guest
                                <li><a href="https://tnn88.automebet.com/tnn88/ufabet/register">สมัครสมาชิก</a></li>
                                <li><a href="{{ route('login') }}">ตรวจสอบค่าคอมมิชชั่น</a></li>
                            @else
                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ออกจากระบบ</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @if(Auth::user()->type == 1)
                                <li><a href="{{ route('user.commission') }}">ค่าคอมมิชชั่น</a></li>
                                @endif

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <nav class="navbar navbar-expand-lg shadow-sm navbar-dark " style="background-color: #000000;">
            <div class="container">
                <a class="navbar-brand p-0" href="{{ url('/') }}">
                    <img src="/images/logo.jpg" alt="logo" width="69x   px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">หน้าหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li>
                        @guest
                        @else
                        @if( Auth::user()->type == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">จัดการ</a>
                        </li>
                        @elseif(Auth::user()->type == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.commission') }}">คอมมิชชั่น</a>
                        </li>
                        @endif
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="https://tnn88.automebet.com/tnn88/ufabet/login">เข้าสู่ระบบหรือเข้าเล่นเกมส์และ ฝาก-ถอน</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer>
            <div class="container mt-5 mb-5">
                <div style="color: #fff; font-size: 14px; border-top: 1px solid #fff;" class="pt-4 text-center">
                    ©2020.TNN88.net All Rights Reserved
                </div>
            </div>
        </footer>

    </div>

    @yield('script')
</body>
</html>
