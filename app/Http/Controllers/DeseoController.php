<?php

namespace App\Http\Controllers;

use App\Models\Deseo;
use App\Models\Categorias;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class DeseoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deseos = Deseo::all(); // Obtiene todos los deseos
        return view('welcome', compact('deseos'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos y guardarlos en $datos
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'estado_id' => 'required|exists:estados,id',
        ]);

        // Asegurar que el usuario con ID 1 existe o crearlo
        $usuario = Usuarios::firstOrCreate(
            ['id' => 1], // Busca un usuario con ID 1
            [
                'nombre' => 'Usuario Prueba',
                'email' => 'prueba@email.com',
                'contraseña' => bcrypt('123456') // Agregar una contraseña cifrada
            ]
        );
        

        // Asignar el usuario al deseo
        $datos['usuario_id'] = $usuario->id;

        // Convertir la categoría a minúsculas antes de guardarla
        if (!empty($request->categoria)) {
            $categoriaNombre = strtolower($request->categoria);
            $categoria = Categorias::firstOrCreate(['nombre' => $categoriaNombre]);
            $datos['categoria_id'] = $categoria->id;
        } else {
            $datos['categoria_id'] = null;
        }

        // Crear el deseo con los datos correctos
        Deseo::create($datos);

        return redirect()->back()->with('success', 'Deseo guardado con éxito.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Deseo $deseos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deseo $deseos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deseo $deseos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deseo $deseo)
    {
        $deseo->delete();
        return redirect()->back()->with('success', 'Deseo eliminado con éxito.');
    }    
}
