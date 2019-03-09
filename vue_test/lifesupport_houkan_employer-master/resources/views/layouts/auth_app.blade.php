<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1000" data-react-helmet="true">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/auth_responsive.css') }}" rel="stylesheet" type="text/css">

        @stack('customcss')

</head>
<body>
    <div>
        <nav class="h-nav h-link-color-white h-dsk">
            <div class="h-nav-left h-link-text-dec-none">
                <div class="h-nav-brand">
                    <a href="/">訪看Job</a>
                </div>
                @auth
                <div class="h-nav-itmes">
                    <ul>
                        @if(auth()->user()->isActive())
                            <li><a href="{{route('mode_switch.index')}}">自己作成モード</a></li>
                            <li><span class="employer_name_nav">{{auth()->user()->name}} 様</span></li>
                        @endif
                    </ul>
                </div>
                @endauth
            </div>
            <div class="h-nav-right">
                <div class="h-nav-option">
                    <div class="h-nav-itmes">
                        <ul>
                            @auth
                                @if(auth()->user()->isActive())
                                    <li><a href="{{route('faq')}}">よくあるご質問</a></li>
                                    <li><a href="{{route('mode_switch.index')}}">設定</a></li>
                                @endif
                                <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>                            
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Guest cannot see sidebar -->
        @auth 
            @if(auth()->user()->isActive())
                @include('layouts.sidebar')
            @endif
        @endauth
        <!-- Guest cannot see sidebar -->
        <div class="h-wrapper loading-data"></div>

        <div class="h-popup-container h-p-30 loading-data" popup_name = "2">
          <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
       
    @stack('customjs')

</body>
</html>
