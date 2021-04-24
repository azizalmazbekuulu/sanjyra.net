<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('js/ckeditor.js') }}" defer></script>
	<!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

	<style>
.change-button {
  font-size: 20px;
  background-color: #8c82e9;
  text-align: center;
  border-radius: 20px;
}
.change-button:hover {
  color: red;
  background-color: #abedd8;
  cursor: pointer;
}.tree tr,
.tree td {
  border-spacing: 0px;
}

.tree td {
  padding: 0px;
}</style>

	{{-- Font Awesome --}}
	<script src="https://kit.fontawesome.com/815801c4a2.js" crossorigin="anonymous"></script>

	<script>
		function up(upid, upnum, downid, downnum) {
			$(document).ready(function() {
				$.ajax({
					type: 'POST',
					url: 'http://sanjyra.net/admin/man/up',
					data: {
						upid: upid,
						upnum: upnum,
						downid: downid,
						downnum: downnum
					},
					success: function(data) {
						if (data)
							location.reload();
						else
							alert("Жылдырууга мүмкүн эмес");
					}
				});
			});
		}
	</script>
</head>

<body>
	<div id="app" style="background: #ccf;" class="min-vh-100">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/admin') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/man/*') || Request::is('admin/man') ? 'active' : '') }}" href="{{route('admin.man.index')}}">Адамдар</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/name/*') || Request::is('admin/name') ? 'active' : '') }}" href="{{route('admin.name.index')}}">Ысымдар</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/article/*') || Request::is('admin/article') ? 'active' : '') }}" href="{{route('admin.article.index')}}">Макалалар</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/category/*') || Request::is('admin/category') ? 'active' : '') }}" href="{{route('admin.category.index')}}">Категориялар</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/uruu/*') || Request::is('admin/uruu') ? 'active' : '') }}" href="{{route('admin.uruu.index')}}">Уруулар</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ (Request::is('admin/user_management/user/*') || Request::is('admin/user_management/user') ? 'active' : '') }}" href="{{route('admin.user_management.user.index')}}">Колдонуучулар</a>
						</li>
						<!--<li class="nav-item">-->
						<!--	<a class="nav-link {{ (Request::is('admin/literature/*') || Request::is('admin/literature') ? 'active' : '') }}" href="{{route('admin.literature.index')}}">Колдонулган адабияттар</a>-->
						<!--</li>-->
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="container py-3 bg-light min-vh-100">
			@yield('content')
		</main>
	</div>
</body>

</html>