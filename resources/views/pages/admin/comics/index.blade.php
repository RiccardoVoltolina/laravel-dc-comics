@extends('layouts.welcome')

@section('main_content')
    
<div>
    <h1>All comics</h1>

    <div class="container">
        <div class="row">
            @if(session('messaggio'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Congratulazioni!</strong> {{session('messaggio')}}
            </div>
    
            @endif
            <div class="col d-flex flex-wrap">

                @foreach ($comics as $comic)
                <a href="{{route('comics.show', $comic->id)}}" class="card w-25 m-2 p-5 text-decoration-none">
                    <form action="{{route("comics.destroy", [$comic->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-danger mb-3 border-0" type="submit">Cancella</button>
                    </form>

                    
                    {{-- se l'immagine la mette l'utente stmpo questo sotto, senò uso il percorso di prima --}}
                    {{-- @if (Str::startsWith($comic->thumb, 'comics_images'))
                        <img class="card-img-top" src="{{  asset('storage/' .  $comic->thumb)}}" alt="">

                    
                    @else
                        <img class="card-img-top" src="{{$comic->thumb}}" alt="">
                    @endif --}}
                    <img class="card-img-top" src="{{ Str::startsWith($comic->thumb, 'comics_images') ? asset('storage/' .  $comic->thumb) :  $comic->thumb }}" alt="">

                    <div class="card-body">
                        <h5>Titolo:</h5>
                        <div>{{$comic->title}}</div>
                        <h5>Descrizione:</h5>
                        <div>{{$comic->description}}</div>
                        <h5>Prezzo:</h5>
                        <div>{{$comic->price}}</div>
                        <h5>Serie:</h5>
                        <div>{{$comic->series}}</div>
                        <h5>Data di uscita:</h5>
                        <div>{{$comic->sale_date}}</div>
                        <h5>Genere:</h5>
                        <div>{{$comic->type}}</div>
                        <h5>Artista/i:</h5>
                        <div>{{$comic->artists}}</div>
                        <h5>Autore:</h5>
                        <div>{{$comic->writers}}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    
   

        

    
</div>
@endsection
