<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.posts', [
            'posts' => $posts
        ]);
    }
    //funcion de ver
    public function show(int $id)
    {
        $post = Post::findorFail($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    //funcion de crear
    public function create()
    {
        return view('posts.create');
    }

    //funcion store
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|min:5',
        'author' => 'required',
        'published_at' => 'required|date',
        'content' => 'required|min:10',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'cover_description' => 'nullable|string|max:255',
    ], [
        // Mensajes personalizados para el blog
        'title.required' => 'El título del artículo es obligatorio.',
        'title.min' => 'El título debe tener al menos 5 caracteres.',
        'author.required' => 'Debes indicar quién es el autor.',
        'published_at.required' => 'La fecha de publicación es obligatoria.',
        'published_at.date' => 'Ingresa una fecha válida.',
        'content.required' => 'El contenido del artículo no puede estar vacío.',
        'content.min' => 'El contenido es demasiado corto (mínimo 10 caracteres).',
        'cover.image' => 'El archivo debe ser una imagen válida.',
        'cover.mimes' => 'La imagen debe tener formato: jpeg, png, jpg o webp.',
    ]);

        $data = $request->only(['title', 'author', 'published_at', 'content', 'cover_description']);

        if ($request->hasFile('cover')){
            $data['cover']= $request->file('cover')->store('covers', 'public');
            
        }

        $post = Post::create($data);

        return to_route('blog.index');
    }

    //funcion editar
    public function edit(int $id)
    {
        return view('posts.edit',[
            'post' => Post::findOrFail($id),
        ])
        ->with('feedback.message', 'El Articulo fue actualizado con éxito.');
    }
    //funcion actualizar
    public function update(Request $request, int $id){
        $request->validate([
            'title' => 'required|min:5',
            'author' => 'required',
            'published_at' => 'required|date',
            'content' => 'required|min:10',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4048',
            'cover_description' => 'nullable|string|max:255',
        ], [
            // Mensajes personalizados para el blog
            'title.required' => 'El título del artículo es obligatorio.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'author.required' => 'Debes indicar quién es el autor.',
            'published_at.required' => 'La fecha de publicación es obligatoria.',
            'published_at.date' => 'Ingresa una fecha válida.',
            'content.required' => 'El contenido del artículo no puede estar vacío.',
            'content.min' => 'El contenido es demasiado corto (mínimo 10 caracteres).',
            'cover.image' => 'El archivo debe ser una imagen válida.',
            'cover.mimes' => 'La imagen debe tener formato: jpeg, png, jpg o webp.',
        ]);

        $post = Post::findOrFail($id);
        $oldCover= $post->cover;
        
        $data = $request->only(['title', 'author', 'published_at', 'content', 'cover_description']);

        if ($request->hasFile('cover')) {
           // $data['cover'] = $request->file('cover')->store('covers', 'public');
           $data['cover'] = $request->file('cover')->store('covers');
        }

        $post->update($data);

        if(
            $request->hasFile('cover') &&
            $oldCover !== null &&
            storage::exist($oldCover)
        ){
            storage::delete($oldCover);
        }

        return to_route('blog.index')
            ->with('feedback.message', 'La entrada de blog fue actualizada con éxito.');
    }

    //funcion eliminacion
    public function delete(int $id)
    {
        return view('posts.delete', [
            'post' => Post::findOrFail($id),
        ]);
    }

    //funcion confirm eliminacion
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        if($post->cover !== null&& storage::exists($post->cover)){
            storage::delete($post->cover);
        }

        return to_route('blog.index')
        ->with('feedback.message', 'La entrada de blog fue eliminada con éxito.');
    }
}
