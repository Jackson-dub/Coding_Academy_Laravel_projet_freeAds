<x-layout>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenue sur votre profil {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @if(isset(Auth::user()->id) && Auth::user()->role_as == '0')
                         <a href="/ads/create" class="btn btn-primary">Create Ad</a>
                    @endif
                </div>

                <div class = "adsContainer">
                 @if(isset(Auth::user()->id) && Auth::user()->role_as == '0')
                    <h3>Your Ads</h3>

                    @if(count($ads)>0)
                    <table classe="table table-striped">
                       
                        @foreach($ads as $ad)
                            <tr>
                                <td>Title</td>
                                <td>{{$ad->body}}</td>
                                <td>published the {{$ad->created_at}} by {{$ad->user->name}} </td>
                                <td><a href="/ads/{{$ad->id}}/edit" class="btn btn-default"></a></td>
                            </tr>
                                        <div>
                                            <a class="float-right" href="/ads/{{$ad->id}}/edit">Edit</a>
                                            <form action="/ads/{{$ad->id}}" method="POST">
                                                @csrf
                                            @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                        @endforeach
                    </table>
                    @else
                    <p>You have no Ads</p>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>


</x-layout>
