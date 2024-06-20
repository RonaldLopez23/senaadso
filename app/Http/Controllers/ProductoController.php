<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        // Solo los usuarios autenticados pueden acceder a las rutas de este controlador
        $this->middleware('auth');
        // Solo los usuarios con rol de admin pueden acceder a todas las rutas, excepto 'index'
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        
        // Si no hay categorías, redirigir al formulario de creación de categorías
        if ($categorias->isEmpty()) {
            return redirect()->route('categorias.create')->with('warning', 'No hay categorías disponibles. Por favor, crea al menos una categoría antes de continuar.');
        }
        
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Producto::create($request->all());
        
        return redirect()->route('productos.index')->with('info', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        // Método no implementado en este caso
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->update($request->all());
        
        return redirect()->route('productos.index')->with('info', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('info', 'Producto eliminado exitosamente.');
    }
}
