<!doctype html>
<html lang="ky">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114577571-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114577571-1');
</script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Кыргыз санжырасы">
<meta name="keywords" content="санжыра; кыргыз;">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/logos/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logos/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/logos/favicon-16x16.png') }}">
<link rel="shortcut icon" href="{{ asset('storage/logos/favicon.ico') }}" type="image/x-icon">
<title>@yield('title',config('app.name', 'Кыргыз санжырасы'))</title>

<link rel="manifest" href="/manifest.json">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}?v=2.0.1">
<style>
.hiddenimp {
    display: none !important;
}
</style>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}?v=2" defer></script>
</head>
<body class="font-sans antialiased">
<div id="app" class="bg-gray-100 w-screen max-w-full min-h-screen flex flex-col justify-between">
@include('layouts.sanjyra-navigation')
<main class="container mt-4 p-4 mx-auto w-full max-w-5xl bg-green-50 rounded-lg shadow-2xl h-full">
	<div class="container py-3 mx-auto">
		@yield('content')
	</div>
</main>
<footer class="shadow-lg bg-indigo-300 w-full">
<div class="container max-w-2xl mx-auto p-4">
<div class="flex justify-between m-0 p-3">
<div class="col text-center">
<ul style="text-align: left;list-style-type:circle;">
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('famous-people')}}">Белгилүү инсандар</a>
</li>
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('name')}}">Ысымдар</a>
</li>
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('article')}}">Макалалар</a>
</li>
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('literatures')}}">Колдонулган адабияттар</a>
</li>
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('terms-of-use')}}">Эрежелер</a>
</li>
<li>
	<a class="hover:underline hover:text-gray-700" href="{{route('forum')}}">Форум</a>
</li>
<li id="installContainer" class="hiddenimp">
    <a class="hover:underline hover:text-gray-700" href="{{route('app')}}">Тиркеме (Мобилдик)</a>
</li>
</ul>
</div>
<div class="col text-center">
<span style="font-size:0.9em">Биз социалдык тармактарда</span><br>
<a href="https://www.facebook.com/groups/471779633154987/" target="_blank" rel="noopener"><img src="{{asset('storage/logos/Facebook.png')}}" class="mx-auto" width="30" height="30" alt="Sanjyra.net Facebook"></a><hr class="my-2">
Email: <a class="underline hover:no-underline hover:text-gray-700" href="mailto:info@sanjyra.net">info@sanjyra.net</a><hr class="my-2">
<!-- WWW.NET.KG , code for http://sanjyra.net -->
<a href="https://www.net.kg/stat.php?id=6021&amp;fromsite=6021" target="_blank" rel="noopener">
    <img id="netkgimg" class="mx-auto" src="https://www.net.kg/img.php?id=6021" alt="WWW.NET.KG" width="88" height="31" />
</a>
<script>
java1=""+"refer="+escape(document.referrer)+"&amp;page="+escape(window.location.href)
    + "c=yes&java=now&razresh="+screen.width+'x'+screen.height+"&cvet="+
    (((navigator.appName.substring(0,3)=="Mic"))?
    screen.colorDepth:screen.pixelDepth) + "&jscript=1.3&rand="+Math.random();
    document.getElementById("netkgimg").setAttribute('src', "https://www.net.kg/img.php?id=6021&"+java1);
</script>
<!-- /WWW.NET.KG -->
</div>
</div>
<hr class="border border-red-500 my-6">
<div class="text-center text-gray-700">
&copy;{{ date('Y') }} <a href="{{route('index')}}" class="hover:text-pink-900 hover:underline">Sanjyra.net</a></div>
</div>
</footer>
</div>
<script>function social_share(l){var t=document.title;window.open(l.concat(t),"_blank");}
</script>
<script src="{{ asset('js/pwa.js') }}" defer></script>
@yield('script')
</body>
</html>