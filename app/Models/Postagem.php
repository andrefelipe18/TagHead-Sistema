<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'conteudo',
        'legenda',
    ];

    //Alterando o nome da tabela
    protected $table = 'postagens';


}
