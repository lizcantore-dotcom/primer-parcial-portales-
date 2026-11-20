<x-layouts.main>
    <x-slot:title>Blog y Novedades</x-slot:title>

    <div class="container my-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1>Blog de Tecnología e IT</h1>

           @auth
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('blog.create') }}" class="btn btn-success">
                      + Publicar nueva entrada
                </a>
                @endif
            @endauth

        </div>

        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 blog-card">

                        <div class="card-body d-flex flex-column">
                            @if($post->cover !== null && \Storage::disk('public')->exists($post->cover))
                                <img src="{{ \Storage::disk('public')->url($post->cover) }}" alt="{{ $post->cover_description }}" class="img-fluid rounded shadow-sm max-height-image">
                            @else
                                <div class="p-4 bg-white rounded border text-muted">
                                    Sin portada
                                </div>
                            @endif

                            <p class="text-secondary mb-2">
                                <strong>ID:</strong> {{ $post->id }}
                            </p>

                            <h2 class="card-title h5 fw-bold">
                                {{ $post->title }}
                            </h2>

                            <p class="mb-3">
                                <span class="badge bg-secondary">
                                    {{ $post->author }}
                                </span>
                            </p>

                            <p class="blog-fecha mb-3">
                                <strong>Fecha de publicación:</strong>
                                {{ $post->published_at }}
                            </p>

                            <p class="text-secondary mb-2">
                                <strong>Clasificacion:</strong>
                                {{ $post->rating->abbreviation }}
                            </p>
                            <p class="text-secondary mb-2">
                                <strong>Gama:</strong>
                                @forelse($post -> genres as $genre)
                                    <span class="badge bg-secondary">{{ $genre->name }}</span>
                                @empty
                                    <i>Sin géneros asignados</i>
                                @endforelse
                            </p>

                            <p class="card-text text-secondary">
                                <strong>Contenido:</strong>
                                {{ $post->content }}
                            </p>

                            <div class="mt-auto pt-3">
                                <div class="d-flex flex-wrap gap-2">

                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                       class="btn btn-primary">
                                        Ver
                                    </a>

                 @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('blog.edit', ['id' => $post->id]) }}"
                            class="btn btn-warning">
                            Editar
                        </a>

                        <a href="{{ route('blog.delete', ['id' => $post->id]) }}"
                            class="btn btn-outline-danger">
                            Eliminar
                        </a>
                     @endif
                @endauth

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-layouts.main>
