<!--=== Header Start ===-->
<nav class="navbar navbar-default navbar-fixed white bootsnav on no-full">
    <div class="container my-4">
        <!--=== Start Header Navigation ===-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="eicon ion-android-menu"></i> </button>
            <div class="logo logo-scroll">
                <a href="{{ route('home') }}">
                    <h2 class="logo logo-scroll">TAAP</h2>
                </a>
            </div>
        </div>
        <!--=== End Header Navigation ===-->
        
        <!--=== Collect the nav links, forms, and other content for toggling ===-->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                <li><a class="logo logo-scroll" href="#home">Home</a></li>
                <li><a class="logo logo-scroll" href="{{ route('report.index') }}">Reports</a></li>
                <li><a class="logo logo-scroll" href="#feature">Login</a></li>
            </ul>
        </div>
        <!--=== /.navbar-collapse ===-->
    </div>
</nav>
<!--=== Header End ===-->