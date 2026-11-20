<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ProductosController extends Controller
{
    public function listarProductos()
    {
        //$productos = Product::all();
        $productos = Product::with(['rating', 'genres'])->get();

        return view('productos.productos', [
            'productos' => $productos
        ]);
    }


    //funcion de ver detalle
    public function show(int $id)
    {
        $producto = Product::findOrFail($id);
        return view('productos.show', [
        'producto' => $producto,
        ]);
    }

    //funcion de crear
    public function create()
    {
        return view('productos.create', [
            'ratings'=> Rating::all(),
            'genres'=> Genre::orderBy('name')->get(),
        ]);
    }

    //funcion storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'release_date' => 'required|date',
            'description' => 'required|max:500',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cover_description' => 'nullable|string|max:255',
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
            'cover.image' => 'El archivo seleccionado debe ser una imagen válida.',
            'cover.mimes' => 'La imagen debe tener formato: jpeg, png, jpg o webp.',
            'cover.max' => 'La imagen no puede superar los 2MB.',
        ]);
        $data = $request->only(['name', 'price', 'stock', 'release_date', 'description', 'cover_description', 'rating_fk']);

        if ($request->hasFile('cover')){
            $data['cover']= $request->file('cover')->store('covers', 'public');
            
        }
        
        $producto = product::create($data);

        $producto->genres()->attach($request->input('genre_fks', []));

        return to_route('productos.index')
        ->with('feedback.message', 'El Producto ' . $producto->name . 'se creó con éxito');
    }

    //funcion editar

    public function edit(int $id)
    {
        return view('productos.edit',[
            'producto' => Product::findOrFail($id),
            'ratings'=> Rating::all(),
            'genres'=> Genre::orderBy('name')->get(),
        ]);
    }
    //funcion actualizar
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'release_date' => 'required|date',
            'description' => 'required|max:500',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4048',
            'cover_description' => 'nullable|string|max:255',
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
            'description.max' => 'La descripción no puede superar los 500 caracteres.',
            'cover.image' => 'El archivo seleccionado debe ser una imagen válida.',
            'cover.mimes' => 'La imagen debe tener formato: jpeg, png, jpg o webp.',
            'cover.max' => 'La imagen no puede superar los 4MB.',
        ]);

        $producto = Product::findOrFail($id);
        $oldCover= $producto->cover;
        
        $data = $request->only(['name', 'price', 'stock', 'release_date', 'description', 'cover_description', 'rating_fk']);

        if ($request->hasFile('cover')) {
            //$data['cover'] = $request->file('cover')->store('covers', 'public');
        $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $producto->update($data);
        $producto->genres()->sync($request->input('genre_fks', []));

        if(
    $request->hasFile('cover') &&
    $oldCover !== null &&
    Storage::disk('public')->exists($oldCover)
    ){
    Storage::disk('public')->delete($oldCover);
    }

  
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
       Try{
         DB::transaction(function() use($producto){
        $producto->genres()->detach();
        $producto->delete();
        });
        
        if ($producto->cover !== null && Storage::disk('public')->exists($producto->cover)) {
            Storage::disk('public')->delete($producto->cover);
        }

        return to_route('productos.index')
        ->with('feedback.message', 'El producto fue eliminado con éxito.');
        }catch(\Throwable $th){
            return to_route('productos.index')
        ->with('feedback.message','Ocurrio un error el producto no fue eliminado' )
        ->with('feedback.status', 'danger');
       }
    }
}