<!doctype html>
<html lang="en">
  <head>
    
    @include('layout.header')

  </head>
  <body>

    @include('layout.nav')

    @yield('content')
    
    <script src="{{ asset('js/all.js') }}"></script>

    @yield('modals')
    
    @stack('script')

  </body>
</html>