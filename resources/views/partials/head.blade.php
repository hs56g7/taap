<head>
@if($APP_ENV == 'production')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176766353-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-176766353-1');
</script>
@endif
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="{{ asset('img/TAAP_Favicon.svg') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/master.css') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('trumbowyg/ui/trumbowyg.min.css') }}">
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

<!-- Primary Meta Tags -->
<title>{{ $title ?? "TAAP"}}</title>
<meta name="title" content="{{ $title ?? 'TAAP'}}"/>
<meta name="description" content="{{ $description ?? 'We are a group of law students based at Duke University documenting instances where the Trump Administration may have violated the law. Accountability matters, and no one is above the law.' }}"/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ $report_url ?? config('env.APP_URL') }}"/>
<meta property="og:title" content="{{ $title ?? 'TAAP'}}"/>
<meta property="og:description" content="{{ $description ?? 'We are a group of law students based at Duke University documenting instances where the Trump Administration may have violated the law. Accountability matters, and no one is above the law.' }}"/>
<meta property="og:image" content="{{ asset('img/TAAP_FullLogo.png') }}"/>

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image"/>
<meta property="twitter:site" content="@taap2020"/>
<meta property="twitter:url" content="{{ $report_url ?? config('env.APP_URL') }}"/>
<meta property="twitter:title" content="{{ $title ?? 'TAAP'}}"/>
<meta property="twitter:description" content="{{ $description ?? 'We are a group of law students based at Duke University documenting instances where the Trump Administration may have violated the law. Accountability matters, and no one is above the law.' }}"/>
<meta property="twitter:image" content="{{ asset('img/TAAP_FullLogo.png') }}"/>
<meta property="twitter:image:src" content="{{ asset('img/TAAP_FullLogo.png') }}"/>
<!--https://cards-dev.twitter.com/validator-->
</head>