<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- FONTAWSOME STYLE FOR ICONS -->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- OWN STYLES -->
		<link rel="stylesheet" href="/normalize.css">
		<link rel="stylesheet" href="/app.css">


        <title>{{ $title ?? 'Layout title' }}</title>
	<body>
		<header id="main-header">
			<div id="header-content">
				<div class="d-flex alit-ctr flt-l">
					<a href="{{ route('home') }}">Home</a>
					<a href="{{ route('ads.create') }}">Create my ad</a>
				</div>
				<div class="d-flex alit-ctr flt-r">
					@guest
						<a href="{{ route('signin') }}">Sign In</a>
						<a href="{{ route('users.create') }}">Sign Up</a>
					@endguest
					@auth
						<a class="flt-r" href="{{ route('account') }}">My account</a>
						<form action="{{ route('logout') }}" method="post" class="d-flex jc-r alit-ctr">
						@csrf
							<button class="logout" type="submit" class="flt-r">Logout</button>
						</form>
					@endauth
				</div>
			</div>
		</header>

		<div class ="container" id="main-content">
			{{ $slot }}
		</div>
		<footer id="main-footer">
			<div id="footer-content">
				<p>© FREEADS 2021 by MC-JJ-AP</p>
			</div>
		</footer>
		
		@if (session()->has('flashMessage'))
			<p class="normal flash-message">{{ session('flashMessage') }}</p>
		@endif
		@if (session()->has('errorMessage'))
			<p class="error flash-message">{{ session('errorMessage') }}</p>
		@endif
    </body>
</html>
