<x-layout title="Create Ad">

	<h1>Create category</h1>

	@if($errors->any())
		<div class="alert alert-danger">
			<ul class="list-group">
				@foreach($errors->all() as $error)
					<li class="list-group-item text-danger">
						{{$error}}
					</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{route('categories.store')}}" method="POST">
		@csrf
		<x-forms.input name="name" label="name" type="text" />
		<x-forms.input name="description" label="description" type="textarea" />
		<button type="submit">Create category</button>
	</form>
</x-layout>
