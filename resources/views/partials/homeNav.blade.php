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
                <li class="dropdown home-nav-margin"> <a href="{{ route('report.index') }}" class="logo logo-scroll dropdown-toggle" data-toggle="dropdown">Reports</a>
                    <ul class="dropdown-menu">
                        @foreach($report_categories as $report_category)
                            <li><a href="{{ route('report.index') }}?filter={{ $report_category->short_name }}"><h4>{{ $report_category->name }}</h4></a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="home-nav-margin"><a class="logo logo-scroll" href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
        <!--=== /.navbar-collapse ===-->
    </div>
</nav>
<!--=== Header End ===-->