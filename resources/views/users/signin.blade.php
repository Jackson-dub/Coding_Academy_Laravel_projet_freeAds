<!-- /resources/view/user/signin.blade.php -->
<x-layout title="Sign In">
	<h1 class="text-center">Formulaire de connexion</h1>
	<form action="{{ route('signin') }}" method="POST">
		@csrf
		<x-forms.input name="email" label="Email" type="text" />
		<x-forms.input name="password" label="Password" type="password" value="" />
		<x-forms.input type="checkbox" name="remember_me" label="Remember Me" value="on" />
		<button type="submit">Sign in</button>
		<div><a href="/forget_password">You have forgoten your password</a></div>
	</form>
</x-layout>
