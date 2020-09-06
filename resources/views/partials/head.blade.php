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
<title>{{ $title ?? "TAAP"}}</title>
<link rel="shortcut icon" href="{{ asset('img/TAAP_Favicon.svg') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/master.css') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('grandy/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('trumbowyg/ui/trumbowyg.min.css') }}">
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

<!-- Twitter Meta data -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@taap2020" />
<meta name="twitter:title" content="TAAP" />
<meta name="twitter:description" content="{{ $description ?? 'We are a group of law students based at Duke University documenting instances where the Trump Administration may have violated the law. Accountability matters, and no one is above the law.' }}" />
<meta name="twitter:image" content="{{ asset('img/TAAP_FullLogo.png') }}" />

</head>