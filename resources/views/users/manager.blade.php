<!-- resources/views/users/manager.blade.php -->

<x-layout title="Manage Users">
	<h1>User manager page</h1>
	<p>This is where an admin can manage users</p>
	<a href="{{ route('account'); }}">Back to my account</a>
	<x-manager-table :headers="$headers" :rows="$users" />
</x-layout>
