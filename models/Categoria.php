<?php
// example of using model with eloquent
namespace models;  //archivo esta dentro de un namespace o directorio

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];

}