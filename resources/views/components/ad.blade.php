@if ( isset($ad) )
<article class="d-flex ad">

			@if ($ad->images()->get()->first())
				<img src="{{ asset('ad-images/'.$ad->images()->get()->first()->name) }}" alt="{{ $ad->title }}" class="thumbnail" height="80px" width="80px"/>
			@endif

	<div>
		<div class="about d-flex">
			
				<a href="/ads/{{ $ad->id }}">
				<h2 class="title">
						   {{ $ad->title ?? "Titre de l'ad" }}
				</h2>
			</a>
			<small>Published {{$ad->created_at}} by <a class="linkUser" href="">{{ $ad->user()->get()[0]->nickname ?? ''}}</a><br><span><strong>{{$ad->location}}</strong></span></small>
			<div class="info d-flex">
				<h4 class="category" ><span>Category :</span>
				<a href="/categories/{{ $ad->category->id }}">{{ $ad->category->name }}</a>
			</h4>
			<div class="price"> <h2>{{ $ad->price ?? "Titre de l'ad" }}</h2></div>
			</div>
			
	</div>
		<p class="excerpt">{!! $ad->excerpt !!}</p>
		<hr>
	</div>

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

</article>
@endif
