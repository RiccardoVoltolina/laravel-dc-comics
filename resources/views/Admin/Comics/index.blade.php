@extends('layouts.admin')

@section('main_content')
    
@endsection
<div>
    <h1>show all comics info</h1>

    @foreach ($comics as $comic)
    
    <div>{{$comic->title}}</div>
        
    @endforeach
</div>
@endsection
