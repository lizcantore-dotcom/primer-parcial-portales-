<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductosController extends Controller
{
    public function listarProductos()
    {
        $productos = Product::all();

        return view('productos.productos', [
            'productos' => $productos
        ]);
    }


    //funcion de ver detalle
    public function show(int $id)
    {
        $producto = Product::findorFail($id);
        return view('productos.show', [
        'producto' => $producto,
        ]);
    }

    //funcion de crear
    public function create()
    {
        return view('productos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'release_date' => 'required|date',
            'description' => 'required|max:500',
        ], [
            // Mensajes personalizados
            'name.required' => 'El campo nombre del producto no puede estar vacío.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'price.required' => 'Debes ingresar un precio.',
            'price.numeric' => 'El precio debe ser un valor numérico.',
            'stock.required' => 'El stock inicial es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'release_date.required' => 'La fecha de lanzamiento es obligatoria.',
            'release_date.date' => 'Ingresa una fecha válida.',
            'description.required' => 'La descripción es obligatoria.',
            'description.max' => 'La descripción no puede superar los 250 caracteres.',
        ]);
        $data = $request->only(['name', 'price', 'stock', 'release_date', 'description']);
        
        $producto = product::create($data);

        return to_route('productos.index')
        ->with('feedback.message', 'El Producto ' . $producto->name . 'se creó con éxito');
    }

    //funcion editar

    public function edit(int $id)
    {
        return view('productos.edit',[
            'producto' => Product::findOrFail($id),
        ]);
    }

    public function update(Request $request, int $id){
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'release_date' => 'required|date',
            'description' => 'required|max:500',
        ], [
            // Mensajes personalizados
            'name.required' => 'El campo nombre del producto no puede estar vacío.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'price.required' => 'Debes ingresar un precio.',
            'price.numeric' => 'El precio debe ser un valor numérico.',
            'stock.required' => 'El stock inicial es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'release_date.required' => 'La fecha de lanzamiento es obligatoria.',
            'release_date.date' => 'Ingresa una fecha válida.',
            'description.required' => 'La descripción es obligatoria.',
            'description.max' => 'La descripción no puede superar los 250 caracteres.',
        ]);
         $producto = Product::findorFail($id);
          $data = $request-> only(['name', 'price', 'stock', 'release_date', 'description']);

          $producto -> update($data);

          return to_route('productos.index')
          ->with('feedback.message', 'El producto fue actualizado con éxito.');
    }

    //funcion de eliminar
    public function delete(int $id)
    {
        return view('productos.delete', [
            'producto' => Product::findOrFail($id),
        ]);
    }
    //funcion confirm eliminar
    public function destroy(int $id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return to_route('productos.index')
        ->with('feedback.message', 'El producto fue eliminado con éxito.');
    }
}