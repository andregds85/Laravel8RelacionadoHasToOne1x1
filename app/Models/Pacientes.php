<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{



    use HasFactory;
    protected $table="pacientes";
    protected $fillable = [
        'categorias_id,solicitacao','cns','nomedousuario','municipio','datasolicitacao','unidadedesejada',
        'codigo','observacao1','observacao2'
    ];




    public function buscaCategoria(){
        return $this->hasOne(Categoria::class,'categorias_id','name');
    }



}
