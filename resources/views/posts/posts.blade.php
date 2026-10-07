
<x-layouts.main>
    <x-slot:title>Blog y Novedades</x-slot:title>
    
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Blog de Tecnología e IT</h1>
            @auth
                <a href="{{ route('blog.create') }}" class="btn btn-success">+ Publicar nueva entrada</a>
            @endauth
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Fecha de Publicación</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td class="fw-bold">{{ $post->title }}</td>
                            <td><span class="badge bg-secondary">{{ $post->author }}</span></td>
                            <td>{{ $post->published_at }}</td>
                            <td>{{ $post->content }}</td>
                            <td> 
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="{{ route('posts.show',['id'=>$post->id]) }}" class="btn btn-sm btn-primary">Ver</a>
                                @auth
                                    <a href="{{ route('blog.edit', ['id'=>$post->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('blog.delete',['id'=>$post->id]) }}" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                @endauth
                                   
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.main>