<?php

//AdminController,sarà una estensione del mio Controller

namespace App\Http\Controllers\Admin;

//Importo il mio Controller

use App\Models\Comics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Al richiamo della funzione index faccio vedere la pagina desideata, (in questo caso è il file index situato in pages/admin/comics) e abbiamo creato una variabile che contiene i dati nel modello Comics
        return view('pages.admin.comics.index', ['comics' => Comics::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $newComic = new Comics();

        if ($request->has('thumb')) {
            $file_path =  Storage::put('comics_images', $request->thumb);
            
            $newComic ->thumb = $file_path;
        }
      
        
        $newComic ->title = $request->title;
        $newComic ->description = $request->description;
        $newComic ->price = $request->price;
        $newComic ->series = $request->series;
        $newComic ->sale_date = $request->sale_date;
        $newComic ->type = $request->type;
        $newComic ->artists = $request->artists;
        $newComic ->writers =  $request->writers;
        $newComic->save(); 

        //diciamo di passarceli alla pagina index



        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comics $comics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comics $comics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comics $comics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comics)
    {
        //
    }
}
