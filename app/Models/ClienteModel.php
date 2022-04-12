<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table = "clientes";
    protected $fillable = ['Nombre','Imagen','Cedula', 'Correo', 'Telefono', 'Observacion', 'Estado', 'idcliente'];
    use HasFactory;
    public $timestamps = false;
}
