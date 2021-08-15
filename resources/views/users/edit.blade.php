<!-- /resources/view/user/signup.blade.php -->
<x-layout title="Sign Up">
	<h1 class="text-center">Formulaire d'inscription</h1>
	<form action="/users/{{ $user->id }}" method="POST">
	@csrf
		<x-forms.input type="hidden" name="id" label="" value="{{ $user->id }}" />
		<x-forms.input type="text" name="login" label="Login" value="{{ $user->login }}" />
	
		<x-forms.input type="email" name="email" label="Email" value="{{ $user->email }}"/>
	
		<x-forms.input type="text" name="nickname" label="Nickname" value="{{ $user->nickname }}"/>
	
		<x-forms.input type="number" name="phoneNumber" label="Phone Number" value="{{ $user->phoneNumber }}"/>
	
		<x-forms.input type="checkbox" name="is_admin" label="Admin ?" value="on">
		{{ $user->is_admin() ? 'checked="true"' : '' }}
		</x-forms>
	
		<button type="submit">Update user</button>
	
	<form>
</x-layout>
