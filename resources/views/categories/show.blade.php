<x-layout title="Show Ad">

    <a href="/ads">Go Back</a>
   
    <h1>Category : {{$category->name}}</h1>

        <div>{{$category->description}}</div>

            <div>
            
                @if(count($ads)>0)
                    @foreach($ads as $ad)
                    <div>
                            <h3>{!!$ad->title!!}</h3>
                            <p>{!!$ad->body!!}</p>
                            <small>Published {{$ad->created_at}} by <a class="linkUser" href="">{{ $ad->user()->get()[0]->nickname ?? ''}}</a><br><span><strong>{{$ad->location}}</strong></span></small>
                            <hr>  
                    </div>
                    @endforeach
                @else
                <p>No post found</p>
                @endif

            </div> 
  
        
   

</x-layout>