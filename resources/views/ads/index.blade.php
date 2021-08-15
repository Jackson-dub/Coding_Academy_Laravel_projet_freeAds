<x-layout title="Manage your ads">
    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2x1 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <h1><?php echo Auth::user()->is_admin ? 'All ads' : 'Your ads';?></h1>
    <div class="ad-list d-flex">
    @if(count($ads)>0)
        @foreach ($ads as $ad)
        @if((isset(Auth::user()->id) && Auth::user()->id == $ad->user_id) || Auth::user()->is_admin)
			<x-ad :ad="$ad" />
        @endif
        @endforeach
            {{$ads->links()}}
        @else
        <p>No posts found</p>
    @endif
    </div>
</x-layout>
