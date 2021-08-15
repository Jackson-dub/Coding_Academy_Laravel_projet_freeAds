<!-- resources/views/user/account.blade.php -->
<x-layout title="My Account">
	<h1>{{ auth()->user()->nickname ?? 'User'}}'s account page</h1>
	<p>This is where I can list every information</p>
	<a class="cta" href="{{ route('users.manager') }}">Manage users</a>
	<a class="cta" href="{{ route('ads.index') }}">Manage ads</a>
	<a class="cta" href="{{ route('categories.index') }}">Manage categories</a>

</x-layout>
