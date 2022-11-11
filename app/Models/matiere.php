<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matiere extends Model
{
    use HasFactory;
    protected $tabel = 'matieres';
    protected $fillable=[
        'code_mat',
        'libelle_mat',
        'coefficient_mat',
    ];
    public function epreuves()
    {
        return $this->hasMany(epreuve::class);
    }
//     public function matiere(){
//     return $this->hasMany('App\Models\matiere');
// }
}