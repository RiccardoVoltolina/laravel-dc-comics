PASSAGGI:



Una volta importato laravell bootsrapp e collegato il nostro account di github, dovremo eseguire i seguenti passaggi:

CRUD

CREATE 
READ 
UPDATE 
DELITE 

Set di operazioni fatte all' interno del databasa, REST agisce su una risorsa (una risorsa è una riga nella tabella, quindi agisce nel URL) 

Solitamente si fa un controller per gestire le nostre risorse, attreverso il file web.php situato nelle Routes (all'interno del method, specifichiamo quali informazioni passare)

La risorsa è il 

php artisan route:list     per vedere le rotte

Nel modello abbiamo tutti i nostri record, quindi li sono contenute le informazioni della tabella

php artisan make:model nome_modello -mcrs (creo il modello e il controller)

SHOW prende un dato nella tabella e la vede nel dettaglio (tipo id ecc.)

CREATE:  Ci stampa in pagina un form

Il form deve contenere un action dove si indica la rotta da gestire, con il metodo Post enctype="multipart/form-mdata" per dire al form che stiamo passando i dati a un file 
Sempre nel modello inseriremo il @CSRF che è un meccanismo di protezione per attacchi, creato da laravel

STORE: vengono trasmessi i dati immessi nel CREATE e con return to_route (percorso_pagina); reindirizziamo l'utente a una rotta specifica 

Nel modello, possiamo anche dire quali dati devono essere protetti facendo una nuova istanza(nuova variabile) e mettendola = a un array, contenente le chiavi del mio array che desideriamo 

I dati sono nel modello-> noi li prendiamo con i controllers che poi utilizzeremo nelle rotte

EDIT : restituiamo la view(admin.lightsabers.edit, compact('lightsaber'));

Nell' action del form, dobbiamo utilizzare il metodo POST o GET (se lo vogliamo modificare si utilizza @method('PUT') In questo caso se era richiesto un metodo get, in questo modo sovrascriviamo e diciamo che necessita invece un metodo di tipo put), indicato sotto nel terminale con il comando php artisan route:list

UPDATE: recuperiamo la richiesta e aggiorna il database

OPERAZIONI CRUD:

- Creo un modello, migrazione e seeders:


php artisan make:model nome_modello -ms

-aggiungo i le migrazioni e i sedeers nel database


- creo un resource controller per il modello nella cartella admin 

php artisan make:controller Admin/NomeController --resources --model=nomeModello



- creo una resource Routes nel file web.php

Route::resource('admin/identificativo_risorsa', NomeController::class) se dobbiamo chiamare una funzione precisa, andrà scritto tra le quadre

Ricordiamoci di importare il controller all'inizio del file

-implemento il resource controller methods

Index: mostra la lista delle risorse e risponderà sempre alla rotta nome nome_modello.index qui vedrò

public function index() {
    $variabile = nomeModello::all()
    return view(admin.nome_pagina, compact('variabile'))
}

CREATE: Ritorna una pagina con il form

public function create() {
    return view
}

STORE: e legato al create, perchè prende i dati dal form e li salva nella tabella


Quando utilizziamo create o update si immette nel database in blocco una serie di dati (mass assignment) per questo, dovremo modificare il model, per andare a consentire le proprietà da creare o da aggiornare



DESTROY: Quando entriamo nella pagina, andremo ad azionare il metodo destroy (il nome della rotta è delete)
Vuole sapere il parametro della rotta da distruggere es $comic->id

Utilizza il metodo POST e necessita anche essa del @csrf e sotto del @method('DELETE')
(Questi passaggi vanno fatti nella pagina admin)

nella funzione scrivere:

$comic->delete

if(!is_null($comic->thumb)) {
    Storage::delete($comic->thumb)
}
In questo modo andiamo a rimuovere le immagini dallo Storage,che avevamo messo con la funzione store

return to_route('percorso per l'index)->with('message', 'messaggio eliminato con successo'); 
Qui con il metodo with reindirizziamo l'utente alla sessione specificata dal to_route e gli mandiamo il messaggio scritto

nel template scrivere poi @if(session('messaggio della sessione'))

Questa operazione è molto rischiosa, poichè rimuove i dati dal database, perciò è meglio inserire un messaggio di conferma per l'utente

Perciò nella pagina di layout, possiamo costruire una modale, dove nell' id='modalId-{{$comic->id}}'



