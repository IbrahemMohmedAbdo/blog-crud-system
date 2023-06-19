<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

@include('layouts.header')




@yield('content')
@yield('search')
@yield('index')
@yield('post')
@yield('about')
@yield('contact')




   <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src={{asset('assets/js/jquery.min.js')}}></script>
    <script src={{asset('assets/js/templatemo-script.js')}}></script>
    @yield('script')
</body>
</html>
