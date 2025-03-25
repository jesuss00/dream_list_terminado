<?php

namespace App\Http\Controllers;

use App\Models\Deseo;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos recibidos
    $request->validate([
        'usuario_id' => 'required|exists:usuarios,id',
        'nombre' => 'required|string|max:255',
        'categoria_id' => 'nullable|exists:categorias,id',
        'estado_id' => 'required|exists:estados,id',
    ]);

    // Crear un nuevo deseo con los datos del formulario
    $deseo = Deseo::create([
        'usuario_id' => $request->usuario_id,
        'nombre' => $request->nombre,
        'categoria_id' => $request->categoria_id,
        'estado_id' => $request->estado_id,
    ]);

    // Retornar una respuesta
    return response()->json(['message' => 'Deseo guardado con éxito', 'deseo' => $deseo], 201);
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
    public function destroy(Deseo $deseos)
    {
        //
    }
}
