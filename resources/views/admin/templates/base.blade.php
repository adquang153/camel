<!doctype html>
<html lang="en">
  <head>
    <title>Admin - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @section('css')
    @show
  </head>
  <body>
    @include('admin/templates/header')
    
    <section class="content_admin">
      
      <div class="row w-100">
          <div class="col-lg-3 col-md-4 ">
            @include('admin/templates/sidebar')
          </div>
          <div class="col-lg-9 col-md-8">
              @section('content')
              @show
          </div>
      </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="{{asset('js/font-awesome-kit.js')}}"></script>
    @section('scripts')
    @show
  </body>
</html>