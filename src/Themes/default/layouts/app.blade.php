<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('head.meta') 

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet" media="screen">
    <link href="{{ asset(theme_mix('css/style.css')) }}" rel="stylesheet" media="screen">
    @yield('head.css')   

    <!-- Scripts -->
    <script type="text/javascript">
        window.Laravel = {!! get_javascript_vars() !!};      
    </script>

    @yield('head')
</head>
<body>
 
    <div id="app">

            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-comments-o"></i> {{ config('app.name') }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                  </ul>
                  <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Zoeken">
                    </div>
                  </form>

                  <ul class="nav navbar-nav navbar-right">
                    @if( !Auth::check() )
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Registreren</a></li>
                    @else
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->avatar }}" class="img-circle"> {{ Auth::user()->name }} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ Auth::user()->profile_url }}" data-route="{{ Auth::user()->profile_data_url }}">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                          </ul>
                        </li>
                    @endif

                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

            <div class="container content">        
              @yield('content')
            </div> 

    </div>

    <script src="{{ asset(mix('/js/app.js')) }}"></script>
    @yield('body')
</body>
</html>