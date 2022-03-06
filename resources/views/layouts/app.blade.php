<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('includes.head')      
   </head>
   <body>     
      @include('includes.header')
      
      <main class="py-4">
         @include('includes.alertMessage')
         @yield('content')
      </main>
      
      @include('includes.footer')      
   </body>
</html>