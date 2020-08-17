
<!doctype html>
<html>
@include('partials.head')
@yield('css')

<body id="page-top" data-spy="scroll" data-target=".navbar">

<!--=== Loader Start ======-->
<div id="loader-overlay">
  <div class="loader">
    <div class="loader-inner"></div>
  </div>
</div>
<!--=== Loader End ======-->

<div class="wrapper">

    @include('partials.homeNav')
    @yield('content')
    @include('partials.footer')

</div>

</body>

@include('partials.globaljs')
@yield ('js')
</html>