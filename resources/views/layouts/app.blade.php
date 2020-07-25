<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}"  rel="stylesheet">

    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/plugin/font-awesome.min.css')}}">
    
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nivo-slider.css') }}" rel="stylesheet">
    

</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body>
    <!-- Site wrapper -->
    <div class="wrapper" id="app">
    
      <div class="content-wrapper">
            @yield('content')
       </div>

</div>

{{-- <script src="{{asset('js/plugin/jquery.nivo.slider.js')}}"></script> 
<script src="{{asset('js/plugin/semantic.min.js')}}"></script> --}}
<script src="{{asset('js/plugin/wow.min.js')}}"></script>
  



{{-- <script src="{{asset('js/main.js')}}"></script> --}}
    @auth
       <script defer>
           window.loggedUser=@json(auth()->user());
       </script>
    @endauth
<script type="text/javascript">
    new WOW().init()





// jQuery(".click").click(function(){
//     alert("yesss");
// })

  </script>



</body>
</html>
