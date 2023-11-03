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
     * la funzione viene richiamata quando accedo alla pagina (admin/comics/create), tramite le rotte
     * la funzione create serve a ritornare la view create
     */
    public function create()
    {
        return view('pages.admin.comics.create');
    }

    /**
     * prendo i dati scritti nel form del create e li aggiungo al database
     */
    public function store(Request $request)
    {
        
        $newComic = new Comics();

        if ($request->has('thumb')) {
            $file_path =  Storage::put('comics_images', $request->thumb);
            
            $newComic ->thumb = $file_path;
        }
      
        // inserisco i dati contenuti nel seeder (ComicsSeeder.php)
        
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
     * la funzione viene richiamata quando accedo alla pagina admin/comics/{comic}, tramite le rotte
     * la funzione create serve a ritornare la view show (in questo caso gli passiamo anche la variabile $comic per passargli i dati per stampare)
     */
    public function show(Comics $comic)

    {
        return view('pages.admin.comics.show', compact('comic'));

    }

    /**
     * la funzione viene richiamata quando accedo alla pagina admin/comics/{comic}/edit, tramite le rotte
     * la funzione edit serve a ritornare la view edit 
     */
    public function edit(Comics $comic)
    {
        return view('pages.admin.comics.edit', compact('comic'));

    }

    /**
     * prendo i dati scritti nel form del edit e li aggiorno nel database
     * bisogna ricordarsi di aggiornare il model Comics
     */
    public function update(Request $request, Comics $comic)
    {
        
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
