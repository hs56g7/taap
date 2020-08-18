<!--=== Header Start ===-->
<nav class="navbar navbar-default navbar-fixed white bootsnav on no-full">
    <div class="container my-4">
        <!--=== Start Header Navigation ===-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="eicon ion-android-menu"></i> </button>
            <div class="logo logo-scroll">
                <a href="{{ route('home') }}">
                    <h2 class="logo logo-scroll" style="color:#000000">TAAP</h2>
                </a>
            </div>
        </div>
        <!--=== End Header Navigation ===-->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('user.index') }}">Dashboard</a></li>
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('user.create') }}">Add Report</a></li>
                <li class="home-nav-margin"><a class="logo logo-scroll" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a></li>
            </ul>
        </div>
    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</nav>
<!--=== Header End ===-->