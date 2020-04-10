@extends('sanjyra.layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
		<div class="code">
			@yield('code')
		</div>

		<div class="message" style="padding: 10px;">
			@yield('message')
		</div>
	</div>
@endsection