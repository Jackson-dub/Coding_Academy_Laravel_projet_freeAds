<x-layout>

	<x-slot name="title">
		{{ $ad->title }}
	</x-slot>

	<a class="cta back" href="/">Go Back</a>

	<div class="detail">
	<h1>{{ $ad->title }}</h1>
	<h4>Category : <a href="/categories/{{$ad->category->id}}">{{$ad->category->name}}</a></h4>
	<small>Written on {{ $ad->created_at }} by {{ $ad->user->name ?? 'Author' }}</small>
	</div>
    
	<div class="individualAd d-flex">
		<div class="d-flex pictures">
			@foreach ($ad->images()->get() as $image)
				<img src="{{ asset('ad-images/'.$image->name) }}" alt="{{ $ad->title }}" class="@if ($loop->first)first @endif thumbnail" />
			@endforeach
		</div>
	    <p>{{ $ad->description }}</p>
	    <hr>

		@auth
	    	
	    <div class="d-flex managementLink">

			@if(isset(Auth::user()->id) && Auth::user()->id == $ad->user_id)
				<a class="float-right" href="/ads/{{$ad->id}}/edit">Edit</a>
			@endif
			@if((isset(Auth::user()->id) && Auth::user()->id == $ad->user_id )|| Auth::user('isAdmin'))
				<form action="/ads/{{$ad->id}}" method="POST">
					@csrf
				@method('delete')
					<button type="submit">Delete</button>
				</form>
			@endif
			
		</div>

		@endauth

	</div> 

</x-layout>

