<!-- resources/views/homepage.blade.php -->

<x-layout>

	<x-slot name="title">
		FreeAds - Homepage	
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

	<div class="ad-list d-flex">
		@foreach ($ads as $ad)
			<x-ad :ad="$ad" /> 
		@endforeach
		<div class="w-100 clr-b"></div>
	</div>
</x-layout>
