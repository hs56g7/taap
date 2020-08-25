<!--=== Header Start ===-->
<nav class="navbar navbar-default navbar-fixed white bootsnav on no-full">
    <div class="container my-4">
        <!--=== Start Header Navigation ===-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="eicon ion-android-menu"></i> </button>
            <div class="logo logo-scroll">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/TAAP_SmallerLogo.svg') }}" class="logo logo-scroll" >
                </a>
            </div>
        </div>
        <!--=== End Header Navigation ===-->
        
        <!--=== Collect the nav links, forms, and other content for toggling ===-->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('home') }}">Home</a></li>
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('report.index') }}">Reports</a></li>
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
        <!--=== /.navbar-collapse ===-->
    </div>
</nav>
<!--=== Header End ===-->