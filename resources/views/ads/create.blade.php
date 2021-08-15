<!-- resources/views/ad/create.blade.php -->
<x-layout title="Create Ad">
	<h1 class="text-center">Create a fresh new ad</h1>
	<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
		<x-forms.input name="title" label="Title" type="text" />
		<x-forms.input name="description" label="Description" type="text" />
		<x-forms.select name="category" label="Category" :options="$categories"/>
		<x-forms.input name="picture[]" label="Picture" type="file">
			accept=".jpg,.png,.jpeg" multiple="true"
		</x-forms>
		<x-forms.input name="price" label="Price" type="text" />
		<button type="submit">Create ad</button>
	</form>
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
</x-layout>
