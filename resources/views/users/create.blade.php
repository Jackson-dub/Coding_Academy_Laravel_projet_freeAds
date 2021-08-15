<!-- /resources/view/user/signup.blade.php -->
<x-layout title="Sign Up">
	<h1 class="text-center">Formulaire d'inscription</h1>
	<form action="{{ route('users.store') }}" method="POST">
	@csrf
		<x-forms.input type="text" name="login" label="Login" value="{{ old('login') }}" />

		<x-forms.input type="email" name="email" label="Email" value="{{ old('email') }}"/>

		<x-forms.input type="password" name="password" label="Password" />

		<x-forms.input type="password" name="password_confirmation" label="Password Confirmation" />

		<x-forms.input type="text" name="nickname" label="Nickname" value="{{ old('nickname') }}"/>

		<x-forms.input type="number" name="phoneNumber" label="Phone Number" value="{{ old('phoneNumber') }}"/>
		<x-forms.input type="checkbox" name="remember_me" label="Remember Me" value="{{ old('remember_me') }}"/>

		<button type="submit">Sign up</button>

	<form>
</x-layout>
