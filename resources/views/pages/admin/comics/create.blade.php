
@extends('layouts.welcome')

@section('main_content')
    
<div>
    <h1>All comics</h1>    
   

        

    <form action="{{route("comics.store")}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="titleHelper" class="form-text text-muted">Scrivi una descrizione</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="descriptionHelper" class="form-text text-muted">Scrivi una descrizione</small>
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" aria-describedby="thumb_helper">
            <div id="thumb_helper" class="form-text">Inserisci una immagine</div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="priceHelper" class="form-text text-muted">Scrivi il prezzo</small>
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" name="series" id="series" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="seriesHelper" class="form-text text-muted">Scrivi il prezzo</small>
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Data uscita</label>
            <input type="date" class="form-control" name="sale_date" id="sale_date" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="sale_dateHelper" class="form-text text-muted">Scrivi la data</small>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Genere</label>
            <input type="text" class="form-control" name="type" id="type" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="typeHelper" class="form-text text-muted">Scrivi il genere</small>
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artisti</label>
            <input type="text" class="form-control" name="artists" id="artists" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="artistsHelper" class="form-text text-muted">Scrivi gli artisti</small>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Scrittori</label>
            <input type="text" class="form-control" name="writers" id="writers" aria-describedby="helpId" placeholder="scrivi una descrizione">
            <small id="writersHelper" class="form-text text-muted">Scrivi gli scrittori</small>
        </div>


        <button type="submit" class="btn btn-primary">
            Save
        </button>


    </form>

</div>    
</div>
@endsection
