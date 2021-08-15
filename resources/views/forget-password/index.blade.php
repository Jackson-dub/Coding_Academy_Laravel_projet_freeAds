@if(session()->has('error'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2x1 py-4">
        {{ session()->get('error') }}
    </p>
</div>
@endif
<x-layout title="Forget password">
	<h1 class="text-center">Formulaire de connexion</h1>
	<form form action="/reset_password" method = "POST">
    @csrf
		<x-forms.input name="email" label="Email" type="text"/>
        <div class="submit">
        <button type="submit">Submit</button>
        <div class="message">Have en account <a href="{{ route('signin') }}">sign in</a>here</div>
        </div>
	</form>
</x-layout>