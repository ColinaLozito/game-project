<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" 
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
        <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">


        <title>My Game Project</title>      
    </head>
    <body>
  <div id="nav">
    <nav>
      <ul>
        <li><a href="{{ url('logs') }}" type="button" class="about">Heroes Logs</a></li>
        <li><a href="{{ url('play') }}" type="button" class="about">Play</a></li>
        <li><a href="{{ url('heroes/hero/create') }}" type="button" class="about">Create Hero</a></li>
        <li><a href="{{ url('/') }}"><img class="logo-img" src="http://www.myiconfinder.com/uploads/iconsets/5e2a8fe966bf6f56fc29234d1e5817b8.png"></a></li>
      </ul>
    </nav>
  </div>
        @yield('main')
        @yield('create')
        @yield('play')
        @yield('logs')
  
      </body>
</html>
