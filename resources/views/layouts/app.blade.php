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
    <script src="{{ asset('js/teste.js') }}" defer></script>
    <script src="{{ asset('js/funcoes.js') }}" defer></script>
    <script src="{{ asset('js/cep.js') }}" defer></script>
    <script src="{{ url('"https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"')}}></script>
    <!-- Adicionando JQuery -->
    <script src="{{ url('"https://code.jquery.com/jquery-3.4.1.min.js"')}} integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0216137103.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link bg-primary text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Cadastrar') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-primary text-white" href="{{ url('cadastro/automovel') }}">
                                        {{ __('Automóvel') }}
                                    </a>
                                    <a class="dropdown-item bg-primary text-white" href="{{url('cadastro/filial')}}">
                                        {{ __('Filial') }}
                                    </a>
                                    <a class="dropdown-item bg-primary text-white" href="{{url('cadastro/funcionario')}}">
                                        {{ __('Funcionario') }}
                                    </a>
                                </div>
                            </li> 
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Consultar') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-primary text-white" href="{{url('consultar/automovel')}}">
                                        {{ __('Automóvel') }}
                                    </a>
                                    <a class="dropdown-item bg-primary text-white" href="{{url('consultar/filial')}}">
                                        {{ __('Filial') }}
                                    </a>
                                    <a class="dropdown-item bg-primary text-white" href="{{url('consultar/funcionario')}}">
                                        {{ __('Funcionario') }}
                                    </a>
                                </div>
                            </li>  
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nome }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('pages.flash-message')

            @yield('content')
        </main>
    </div>
</body>
</html>
