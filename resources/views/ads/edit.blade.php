<x-layout title="Edit Ad">
    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2x1 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <h1>Edit Ad</h1>
    <div>
        <img src="{{$ad->picture}}" alt="">
		<form action="/ads/{{$ad->id}}" method="POST" enctype="multipart/form-data">
			@csrf
            @method('PUT')
			<label for="title">Title</label>
			<input type="text" name="title" value="{{$ad->title}}">
	
			<label for="description">Description</label>
			<input type="textarea" name="description" value="{{$ad->description}}">
	
			<label for="category">Category</label>
			<input type="text" name="category" value="{{$ad->category->id}}">

			<label for="price">Price</label>
			<input type="text" name="price" value="{{$ad->price}}">
	
			<label for="picture">Picture</label>
			<input type="file" name="picture[]" id="picture" multiple="multiple">
            
			<button type="submit" value="Valider">Submit ad</button>

	
	
		</form>
	</div>   
</x-layout>