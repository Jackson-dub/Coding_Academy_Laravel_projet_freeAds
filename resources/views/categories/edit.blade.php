<x-layout title="Edit Category">
    <h1>Edit Category</h1>

    <div>
       
		<form action="/categories/{{$category->id}}" method="POST">
			@csrf
            @method('PUT')
			
			<input type="text" name="name" value="{{$category->name}}">
	
			<input type="textarea" name="description" value="{{$category->description}}">
	
			<button type="submit" value="Valider">Save edition</button>
			<a href="{{ url()->previous() }}">Cancel</a>

		</form>
	</div>   
</x-layout>
