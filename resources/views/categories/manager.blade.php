<!-- resources/views/categories/manager.blade.php -->

<x-layout title="Manage Categories">
	<h1>Categoy manager page</h1>
	<a href="{{ route('categories.create') }}">Add a new category</a>
	<p>This is where an admin can manage categories</p>
	<a href="{{ route('account'); }}">Back to my account</a>
	<x-manager-table :headers="$headers" :rows="$rows" />
</x-layout>
