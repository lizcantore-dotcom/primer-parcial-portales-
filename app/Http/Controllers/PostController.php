<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|min:5',
        'author' => 'required',
        'published_at' => 'required|date',
        'content' => 'required|min:10',
    ], [
        // Mensajes personalizados para el blog
        'title.required' => 'El título del artículo es obligatorio.',
        'title.min' => 'El título debe tener al menos 5 caracteres.',
        'author.required' => 'Debes indicar quién es el autor.',
        'published_at.required' => 'La fecha de publicación es obligatoria.',
        'published_at.date' => 'Ingresa una fecha válida.',
        'content.required' => 'El contenido del artículo no puede estar vacío.',
        'content.min' => 'El contenido es demasiado corto (mínimo 10 caracteres).',
    ]);

        $data = $request->only(['title', 'author', 'published_at', 'content']);

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
    public function update(Request $request, int $id){
        $request->validate([

        'title' => 'required|min:5',
        'author' => 'required',
        'published_at' => 'required|date',
        'content' => 'required|min:10',
    ], [
        // Mensajes personalizados para el blog
        'title.required' => 'El título del artículo es obligatorio.',
        'title.min' => 'El título debe tener al menos 5 caracteres.',
        'author.required' => 'Debes indicar quién es el autor.',
        'published_at.required' => 'La fecha de publicación es obligatoria.',
        'published_at.date' => 'Ingresa una fecha válida.',
        'content.required' => 'El contenido del artículo no puede estar vacío.',
        'content.min' => 'El contenido es demasiado corto (mínimo 10 caracteres).',
        ]);

        $post = Post::findorFail($id);
        $data = $request->only(['title', 'author', 'published_at', 'content']);
        $post -> update($data);

        return to_route('blog.index')
        ->with('feedback.message', 'La entrada de blog fue actualizado con éxito.');
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

        return to_route('blog.index')
        ->with('feedback.message', 'La entrada de blog fue eliminada con éxito.');
    }
}
