<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class epreuve extends Model
{
    protected $tabel = 'epreuves';
    protected $fillable=[
        'date_ep',
        'lieu_ep',
        'matiere_id'
        
    ];
    public function matieres()
    {
        return $this->belongsTo(matiere::class,'matiere_id');
    }
//     public function epreuve(){
//     //return $this->hasMany('App\Models\epreuve');
// }
}
