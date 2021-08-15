<!-- resources/views/ads/manager.blade.php -->

<x-layout title="Manage Ads">
	<h1>Ad Manager Page</h1>
	<a href="{{ route('ads.create') }}">Create a new ad</a>
	<p>This is where an admin can manage ads</p>
	<a href="{{ route('account'); }}">Back to my account</a>
	<x-manager-table :headers="$headers" :rows="$ads" />
</x-layout>
