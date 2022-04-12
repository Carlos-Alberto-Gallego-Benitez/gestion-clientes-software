<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = "usuarios";
    protected $fillable = ['Nombre','Apellido','Correo', 'Telefono', 'Password',];
    use HasFactory;
    public $timestamps = false;
}
