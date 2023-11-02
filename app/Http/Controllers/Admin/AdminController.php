<?php

//AdminController,sarà una estensione del mio Controller

namespace App\Http\Controllers\Admin;

//Importo il mio Controller

use App\Models\Comics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        dd('ciao');

        // $data = $request->all();

        // $comic = Comics::create($data);
        //Mettiamo nuovi dati da inserire nel database
        
       $newComic = new Comics();
        $newComic ->title = 'wsxsxs';
        $newComic ->description = "The Joker is dead, Bruce Wayne is behind bars...and Gotham City is just starting to redefine itself without Batman. As Harley Quinn struggles to adjust to her new life as the mother of Jack Napier’s twins, an elusive mastermind called the Producer seizes the moment to assemble a crew of villains-starting with the Starlet, a serial killer who murders Gotham’s golden age film stars in homage to their silver screen roles. When a recent, gruesome crime scene suggests a connection to The Joker, the GTO, and FBI agent Hector Quimby turn to Harley as the one person with information that could crack the case. With some help from Bruce, Harley agrees to investigate-but to protect her children and her city from a fatal final act, Harley must flirt with madness and confront her own past.";
        $newComic ->thumb = "https://imgs.search.brave.com/qMxyCwK99aguaETp4ioxXLrpxwNg2JNBN3Oq7LGAgzM/rs:fit:780:1200:1/g:ce/aHR0cHM6Ly9jZG4u/ZmxpY2tlcmluZ215/dGguY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDIwLzEwL0Jh/dG1hbi1XaGl0ZS1L/bmlnaHQtUHJlc2Vu/dHMtSGFybGV5LVF1/aW5uLTEtMS5qcGc";
        $newComic ->price = "$4.99";
        $newComic ->series = "batman";
        $newComic ->sale_date = "2020-10-20";
        $newComic ->type = "horror";
        $newComic ->artists = "Giacomo";
        $newComic ->writers =  "Katana Collins";
        $newComic->save(); 

        //diciamo di passarceli alla pagina index



        // return to_route('comics.index', $data);
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
