<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comics extends Model
{
    use HasFactory;

    // andiamo a scrivere il nome della tabella
    protected $table = 'Comics';

    // creo una nuova variabile ($fillable che è una variabile creata da laravel!) protetta e gli passo un array, contenente tutti i dati del seeder (ComicsSeeder.php)
    protected $fillable = ['title', 'description', 'price', 'series', 'sale_date', 'type', 'artists', 'writers'];
}
