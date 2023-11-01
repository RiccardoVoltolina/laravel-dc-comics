@extends('layouts.welcome')

@section('main_content')
    
<div>
    <h1>show all comics info</h1>

    @foreach ($comics as $comic)
    
    <div>{{$comic->title}}</div>
        
    @endforeach

    <form action="{{route('comics.store')}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf

        <button type="submit" class="btn btn-primary">
            Save
        </button>


    </form>
    
</div>
@endsection
