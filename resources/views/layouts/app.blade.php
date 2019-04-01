<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PowerQuip - @yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    </head>
    <body>
      
        {{-- 
    START NAVBAR

    1. Create a Navbar with the ff. links
      - Application/Brand Name with an href "/home"
      - A Dropdown list that has the ff. list items:
        @guest the user is a guest
          - Login
          - Register
        @else
          - Home
          - Library
          @if the user is an Admin
            - Users
            - A button to add Books
            - A button to add Categories
          @else
            - Account
          @endif
          - A Dropdown toggle that has the ff. links:
            - Logout
            - A hidden form with a method POST
              - Add @csrf
        @endguest

    END NAVBAR
  --}}
       <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            
                            @if(Auth::user()->type == "admin") 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('inventorytools.index') }}">{{ __('Tools') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Tools') }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">  
                                        <span class="dropdown-item"><strong>{{ __('Add To Database') }}</strong></span>
                                        <a class="dropdown-item" href="{{ route('registrytool.create') }}">{{ __('Registry') }}</a>
                                        <a class="dropdown-item" href="{{ route('categories.create') }}">{{ __('Category') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <span class="dropdown-item"><strong>{{ __('Get Lists') }}</strong></span>
                                        <a class="dropdown-item" href="{{ route('inventorytools.index') }}">{{ __('Tools Inventory') }}</a>
                                        <a class="dropdown-item" href="{{ route('registrytool.index') }}">{{ __('Tools Registry') }}</a>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}">{{ __('Tools Category') }}</a>

                                    </div>
                                </li>
                            @else
                      <!-- Link should ultimately route to the account dashboard that would list all existing borrowed items -->
                                <li class="nav-item">
                                   <a class="nav-link" href="">Account</a>
                                </li>

                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->first_name) }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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





  {{-- 
    2. Add a yield for the main content
    
    START MAIN

    main
      @yield('content')
    footer

    END MAIN
  --}}
    @yield('content')

  {{-- 
    3. Add a yield for the JS scripts

    @yield('script')
  --}}

  {{-- 
    4. Add custom scripts here
  --}}
        
        <script src="{{ asset('js/script.js') }}"></script>
        <script type="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
