
<x-layout title="Confirmation page">
 
                <div>
                    <a class="float-right" href="/ads/{{$ad->id}}/edit">Edit</a>
                    <form action="/ads/{{$ad->id}}" method="POST">
                        @csrf
                     @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </div>
   
</x-layout>