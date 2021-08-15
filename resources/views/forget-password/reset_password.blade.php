<x-layout title="Reset password">
	<h1 class="text-center">Formulaire d'inscription</h1>
	<form action="{{ route('getNewPassword',$token) }}" method="POST">
	@csrf

    <x-forms.input type="email" name="email" label="Email" value="{{ old('email') }}"/>

		<x-forms.input type="password" name="password" label="Password" />

		<x-forms.input type="password" name="password_confirmation" label="Password Confirmation" />

		<button type="submit">Sign up</button>

	<form>
</x-layout>