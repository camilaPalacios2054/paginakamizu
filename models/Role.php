<?php
// example of using model with eloquent
namespace models;  //archivo esta dentro de un namespace o directorio

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre'];

}
