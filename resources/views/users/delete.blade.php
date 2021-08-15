<!-- /resources/view/user/delete.blade.php -->
<x-layout title="Delete User">
	<h1 class="text-center">Suppresion de {{ $user->login }}</h1>
	<p>Etes vous sûr de vouloir supprimer l'utilisateur {{ $user->login }} ayant pour email {{ $user->email }}
	<form action="{{ route('users.destroy', $user->id) }}" method="POST">
	@csrf
		{{method_field('DELETE')}}
		<x-forms.input type="hidden" name="id" label="" value="{{ $user->id }}"/>
		<button type="submit">Confirmer la suppression</button>
		<a href="{{ url()->previous() }}">Retour</a>

	<form>
</x-layout>
