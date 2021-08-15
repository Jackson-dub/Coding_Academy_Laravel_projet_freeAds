<x-layout title="All ads">
    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2x1 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <h1>All categories</h1>
    @if(count($categories)>0)
        @foreach ($categories as $category)
                <div>
                    <h3><a href="/categories/{{$category->id}}">{{$category->name}}</a></h3>
                    <p>{!!$category->description!!}</p>
                </div>
                <div>
                        <a class="float-right" href="/categories/{{$category->id}}/edit">Edit</a>
                        <form action="/categories/{{$category->id}}" method="POST">
                            @csrf
                        @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                </div>
          
            @endforeach
            {{$categories->links()}}
        @else
        <p>No categories found</p>
    @endif
</x-layout>