<x-layout>

	<x-slot name="title">
		FreeAds - Search results	
	</x-slot>

	<div class="text-center">
		<h1>Welcome to the FreeAds Website</h1>
	</div>
	
	<form action="{{ route('search.index')}}">
		<div class="mb-3">
		  <input type="search" name="search" class="form-control" placeholder="search">
		</div>
		<div class="mb-3">
			<input type="text" name="minprice" class="form-control" placeholder="minprice">
		  </div>
		<div class="mb-3">
			<input type="text" name="maxprice" class="form-control" placeholder="maxprice">
		  </div>
		<select class="form-select" name="category" data-dependent="state">
			<option selected>All categories</option>
			@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		  </select>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	  </form>

	<div class="d-flex ad-list searchList">
	@foreach ($ads as $ad)
    <article class="d-flex ad">
	<div>
		<div class="about d-flex">
			
				<a href="/ads/{{ $ad->id }}">
				<h2 class="title">
						   {{ $ad->title ?? "Titre de l'ad" }}
				</h2>
			</a>
			<small>Published {{$ad->created_at}} by {{ $ad->user->name ?? ''}}</small>
			<div class="info d-flex">
			</h4>
			<div class="price"> <h2>{{ $ad->price ?? "Titre de l'ad" }}</h2></div>
			</div>
			
	</div>
		<p class="excerpt">{!! $ad->excerpt !!}</p>
	</div>
    </article>
		@endforeach
		<div class="w-100 clr-b"></div>
	</div>
</x-layout>
