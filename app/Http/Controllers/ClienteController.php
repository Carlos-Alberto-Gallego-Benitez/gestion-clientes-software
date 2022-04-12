<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = ClienteModel::where('Estado', 1) ->get() ; //se ejecuta la consulta en la base de datos (SELECT)
        $action = 'index';
        return view('layouts.clientes', compact('clientes', 'action'));
    }


    public function create() //para retornar la vista de el registro
    {
        $action = 'registro';
        return view('layouts.clientes', compact('action'));
    }

 
    public function store(Request $request) //se guarda el registro de el cliente
    {  
        
        $request->validate([
            'Nombre' => 'required',
            'Imagen' => 'required',
            'Cedula' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required',
            'Observacion' => 'required'
        ]);
        $imagen = $request->file('Imagen')->store('clientes', 'public'); //guardado de la imagen
        $url = Storage::url($imagen);
        
        //$role = ClienteModel::create($request->all());

        ClienteModel::create([
            'Nombre' => $request->Nombre,
            'Imagen' => $imagen,
            'Cedula' => $request->Cedula,
            'Correo' => $request->Correo,
            'Telefono' => $request->Telefono,
            'Observacion' => $request->Observacion
        ]);

        $clientes = ClienteModel::where('Estado', 1) ->get(); //se ejecuta la consulta en la base de datos (SELECT) para listar los clientes
        $action = 'index';
        return view('layouts.clientes', compact('clientes', 'action'))->with('info', 'ok');
    }


    public function show(ClienteModel $cliente) //cargar los datos de la acción ver
    {
        $action = 'ver';
        return view('layouts.clientes', compact('cliente', 'action'));
    }


    public function edit(ClienteModel $cliente) //cargar los datos de el cliente a editar
    {
        $action = 'editar';
        return view('layouts.clientes', compact('cliente', 'action'));
    }


    public function update(Request $request, ClienteModel $cliente) //se guardan los datos de el cliente a editar
    {
        $action = 'index';
        $request->validate([
            'Nombre' => 'required',
            'Imagen' => 'required',
            'Cedula' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required',
            'Observacion' => 'required'
        ]);
        $role = ClienteModel::create($request->all());


        $clientes = ClienteModel::where('Estado', 1) ->get(); //se ejecuta la consulta en la base de datos (SELECT) para listar los clientes
        $action = 'index';
        return view('layouts.clientes', compact('clientes', 'action'))->with('info', 'ok');
    }


    public function destroy($id)
    {
        //
    }

    public function delete(ClienteModel $cliente)
    {
        if ($cliente->Estado == 1) {
            $cliente->update(['Estado' => 0]);
        }

        $clientes = ClienteModel::where('Estado', 1) ->get(); //se ejecuta la consulta en la base de datos (SELECT) para listar los clientes
        $action = 'index';
        return view('layouts.clientes', compact('clientes', 'action'))->with('info', 'ok'); 
  
    }
}
