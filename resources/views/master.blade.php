<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	  <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/static/css/alerts.css?v='.time())}}">
    <link rel="stylesheet" href="{{url('/static/css/master.css?v='.time())}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>

  <body id="body-pd" class="body-pd">
    <header class="header body-pd" id="header">
        <div class="header_toggle"> <i class="fas fa-times"  id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar show-side " id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> 
                <i class="fas fa-user icon"></i>
                <p class="mt-3 name text-center" >Bienvenido <br> {{Auth::user()->getFullNameAttribute()}}</p>
            </a>
              <div class="nav_list"> 
                <a href="{{url('/')}}" @if ('home' == Route::currentRouteName() ) class="nav_link active" @else class="nav_link" @endif> 
                  <i class="fas fa-tachometer-alt icon"></i>
                  <span class="nav_name name">Dashboard</span> 
                </a> 
                <a href="{{url('/enterprice')}}" @if ('enterprice' == Route::currentRouteName() ) class="nav_link active" @else class="nav_link" @endif> 
                  <i class="far fa-building icon"></i>
                  <span class="nav_name name">Empresas</span> 
                </a> 
                <a href="{{url('/employees')}}" @if ('employees' == Route::currentRouteName() ) class="nav_link active" @else class="nav_link" @endif> 
                  <i class="fas fa-users icon"></i>
                  <span class="nav_name name">Colaboradores</span> 
                </a> 
            </div>
            </div> 
            <a href="{{url('/logout')}}" class="nav_link "> 
                <i class="fas fa-sign-out-alt icon"></i>
                <span class=" px-2 nav_name name">Cerrar sesión</span> 
            </a>
        </nav>
    </div>

    <nav class="all-breadcrumb" aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
          @yield('breadcrumb')
      </ol>
    </nav>

    <div class="height-100 ">
      @yield('body')
     

    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{url('/static/js/master.js?v='.time())}}"></script>
  </body>
</html