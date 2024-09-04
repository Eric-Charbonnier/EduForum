<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'address',
    'phone',
    'email',
    'birthdate',
    'ville_id',
  ];

  // public function ville()
  // {
  //     return $this->belongsTo(ville::class);  //va établir une relation entre l'etudiant et la ville, source: https://laravel.com/docs/9.x/eloquent-relationships
  //     // Eloquent va chercher la clé étrangère sur la table "etudiant" qui doit être utilisée pour déterminer la "ville" parente d'un "etudiant" donné.
  // }

  public function etudiantHasVille()
  {
    return $this->hasOne('App\Models\ville', 'id', 'ville_id');
    // model, clé primaire, clé etrangere qui vient de plus haut
  }
}
