<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use App\Models\ClienteModel;

class UsuarioController extends Controller
{

    public function index(Request $request) //metodo para consultar los usuarios
    {

        return response($request -> all());
        $request->validate([
            'Correo' => 'required',
            'Password' => 'required'
        ]);
        $clientes = UsuarioModel::where('Correo', $correo) ->get() ; //se ejecuta la consulta en la base de datos (SELECT)
        $action = 'index';
        
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'Correo' => 'required',
            'Password' => 'required'
        ]);

        $correolog = $request -> Correo;
        $paswlog = $request -> Password;

        if($correolog != null && $paswlog != null){
            $usuariolog = UsuarioModel::where('Correo', $correolog) ->get(); //se consulta el correo de el usurio
        
        
            if(count($usuariolog) == 1 && count($usuariolog) != '[]'){
                $passwlog = UsuarioModel::where('Password', $paswlog) ->get();
                if(count($passwlog) == 0 || count($passwlog) == '[]'){
                    echo '<script>alert("Contraseña Incorrecta ")</script>';
                    return view('login');
                }
                else{
                    $clientes = ClienteModel::where('Estado', 1) ->get() ; //se ejecuta la consulta en la base de datos (SELECT)
                    $action = 'index';
                    return view('layouts.clientes', compact('clientes', 'action'));
                }
            }else{
                echo '<script>alert("Usuario Incorrecto ")</script>';
                return view('login');
            } 
        }else{
            echo '<script>alert("Todos los campos son obligatorios ")</script>';
            return view('login');
        }
  
        return response($request-> all());
        
    }

 
    public function show(Request $request)
    {
        $request->validate([
            'Correo' => 'required',
            'Password' => 'required'
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
