<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioModel extends Model
{
    protected $table = "servicios";
    protected $fillable = ['Nombre','Imagen','Cedula', 'Tipo', 'Fechainicio', 'Fechafin', 'Observaciones', 'idcliente'];
    use HasFactory;
    public $timestamps = false;
}
